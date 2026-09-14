<?php

namespace App\Services\Contact;

use App\Mail\ContactVerificationMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class BrevoEmailService implements EmailVerificationServiceInterface
{
    /**
     * Send a verification email containing the 6-digit OTP via Laravel Mail (Brevo).
     *
     * @param string $recipientEmail
     * @param string $otp
     * @param string $recipientName
     * @return bool True if successfully dispatched, false otherwise
     */
    public function sendVerificationEmail(string $recipientEmail, string $otp, string $recipientName = 'Client'): bool
    {
        $recipientEmail = trim($recipientEmail);

        try {
            Mail::to($recipientEmail)->send(new ContactVerificationMail($otp, $recipientName));

            Log::info(sprintf(
                '[EMAIL DISPATCH - BREVO SUCCESS] Recipient: %s',
                $recipientEmail
            ));

            return true;
        } catch (\Throwable $e) {
            // NEVER log the OTP, API keys, or sensitive credentials
            $rawError = $e->getMessage();
            $sanitizedError = preg_replace('/xkeysib-[a-zA-Z0-9_-]+/i', '[REDACTED_API_KEY]', $rawError);
            $sanitizedError = preg_replace('/re_[a-zA-Z0-9_]+/i', '[REDACTED_API_KEY]', $sanitizedError);
            $sanitizedError = preg_replace('/Bearer\s+[a-zA-Z0-9_.-]+/i', 'Bearer [REDACTED]', $sanitizedError);
            $sanitizedError = preg_replace('/password[=:][^\s&]+/i', 'password=[REDACTED]', $sanitizedError);

            Log::error(sprintf(
                '[EMAIL DISPATCH - BREVO ERROR] Recipient: %s, Error: %s',
                $recipientEmail,
                $sanitizedError
            ));

            return false;
        }
    }
}
