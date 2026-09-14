<?php

namespace App\Services\Contact;

use App\Mail\ContactVerificationMail;
use App\Models\ContactVerification;
use App\Services\Sms\SmsServiceInterface;
use Illuminate\Support\Facades\Mail;

class ContactVerificationService
{
    public const CODE_EXPIRATION_MINUTES = 10;
    public const RESEND_COOLDOWN_SECONDS = 60;
    public const MAX_ATTEMPTS = 5;

    protected SmsServiceInterface $smsService;
    protected EmailVerificationServiceInterface $emailService;

    public function __construct(
        SmsServiceInterface $smsService,
        ?EmailVerificationServiceInterface $emailService = null
    ) {
        $this->smsService = $smsService;
        $this->emailService = $emailService ?? app(EmailVerificationServiceInterface::class);
    }

    /**
     * Send or resend an OTP for the given channel ('email' or 'sms').
     *
     * @param string $channel 'email' or 'sms'
     * @param string $destination Email address or normalized phone number
     * @param string $recipientName
     * @return array ['success' => bool, 'message' => string, 'cooldown' => int]
     */
    public function sendOtp(string $channel, string $destination, string $recipientName = 'Client'): array
    {
        $destination = trim($destination);
        if ($channel === 'sms') {
            $destination = PhoneNumberService::normalize($destination);
        }

        // Check if there is an active OTP within cooldown
        $latest = $this->getLatestVerification($channel, $destination);
        if ($latest && !$latest->isVerified() && !$latest->canResend()) {
            $remaining = $latest->resendRemainingSeconds();
            return [
                'success' => false,
                'error' => "Please wait {$remaining} seconds before requesting another code.",
                'cooldown' => $remaining,
            ];
        }

        // Invalidate previous unverified codes for this channel and destination
        ContactVerification::where('channel', $channel)
            ->where('destination', $destination)
            ->whereNull('verified_at')
            ->update([
                'expires_at' => now()->subMinute(),
            ]);

        // Generate secure 6-digit random code
        $code = sprintf('%06d', random_int(100000, 999999));

        $verification = ContactVerification::create([
            'channel' => $channel,
            'destination' => $destination,
            'otp_code' => $code,
            'attempts' => 0,
            'max_attempts' => self::MAX_ATTEMPTS,
            'expires_at' => now()->addMinutes(self::CODE_EXPIRATION_MINUTES),
            'resend_available_at' => now()->addSeconds(self::RESEND_COOLDOWN_SECONDS),
            'verified_at' => null,
            'session_id' => session()->getId(),
        ]);

        // Dispatch via the respective provider
        if ($channel === 'email') {
            try {
                $dispatched = $this->emailService->sendVerificationEmail($destination, $code, $recipientName);
            } catch (\Throwable $e) {
                \Illuminate\Support\Facades\Log::error("Failed to send verification email: " . $e->getMessage());
                $dispatched = false;
            }

            if (!$dispatched) {
                $verification->delete();
                return [
                    'success' => false,
                    'error' => "We couldn't send your verification email right now. Please try again.",
                    'cooldown' => 0,
                ];
            }
        } elseif ($channel === 'sms') {
            $smsMessage = "Your ORDO verification code is: {$code}. Valid for 10 minutes.";
            $this->smsService->sendSms($destination, $smsMessage);
        }

        return [
            'success' => true,
            'message' => $channel === 'email'
                ? "A verification code has been sent to your email."
                : "A verification code has been sent via SMS.",
            'cooldown' => self::RESEND_COOLDOWN_SECONDS,
            'verification' => $verification,
        ];
    }

    /**
     * Verify a submitted OTP code for a channel.
     *
     * @param string $channel 'email' or 'sms'
     * @param string $destination Email address or normalized phone number
     * @param string $code 6-digit code submitted by the user
     * @return array ['success' => bool, 'error' => ?string]
     */
    public function verifyOtp(string $channel, string $destination, string $code): array
    {
        $destination = trim($destination);
        if ($channel === 'sms') {
            $destination = PhoneNumberService::normalize($destination);
        }

        $record = ContactVerification::where('channel', $channel)
            ->where('destination', $destination)
            ->latest('id')
            ->first();

        if (!$record) {
            return [
                'success' => false,
                'error' => "No verification code was requested. Please request a code.",
            ];
        }

        if ($record->isVerified()) {
            return [
                'success' => false,
                'error' => "This verification code has already been used. Please request a new code.",
            ];
        }

        if ($record->isExpired()) {
            return [
                'success' => false,
                'error' => "That code has expired. Request a new code.",
            ];
        }

        if ($record->isMaxAttemptsReached()) {
            return [
                'success' => false,
                'error' => "Too many attempts. Please request a new verification code.",
            ];
        }

        $record->increment('attempts');

        if ((string) $record->otp_code !== (string) trim($code)) {
            $remainingAttempts = max(0, $record->max_attempts - $record->attempts);
            if ($remainingAttempts === 0) {
                return [
                    'success' => false,
                    'error' => "Too many attempts. Please request a new verification code.",
                ];
            }

            return [
                'success' => false,
                'error' => "That code is incorrect. Please try again.",
            ];
        }

        // Code matches!
        $record->update([
            'verified_at' => now(),
        ]);

        return [
            'success' => true,
        ];
    }

    /**
     * Get the latest verification record for target.
     */
    public function getLatestVerification(string $channel, string $destination): ?ContactVerification
    {
        $destination = trim($destination);
        if ($channel === 'sms') {
            $destination = PhoneNumberService::normalize($destination);
        }

        return ContactVerification::where('channel', $channel)
            ->where('destination', $destination)
            ->latest('id')
            ->first();
    }

    /**
     * Determine if the destination is verified.
     */
    public function isChannelVerified(string $channel, string $destination): bool
    {
        $destination = trim($destination);
        if ($channel === 'sms') {
            $destination = PhoneNumberService::normalize($destination);
        }

        return ContactVerification::where('channel', $channel)
            ->where('destination', $destination)
            ->whereNotNull('verified_at')
            ->exists();
    }
}
