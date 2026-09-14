<?php

namespace App\Services\Sms;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class BrevoSmsService implements SmsServiceInterface
{
    protected ?string $apiKey;
    protected string $sender;
    protected string $provider;

    public function __construct()
    {
        $this->apiKey = config('services.brevo.api_key', env('BREVO_API_KEY'));
        $this->sender = config('services.brevo.sms_sender', env('BREVO_SMS_SENDER', 'ORDO'));
        $this->provider = config('services.brevo.sms_provider', env('SMS_PROVIDER', 'brevo'));
    }

    /**
     * Send an SMS message using Brevo Transactional SMS API with safe local development fallback.
     */
    public function sendSms(string $to, string $message): bool
    {
        // Safe development fallback: if no API key is provided or SMS_PROVIDER is set to log
        if (empty($this->apiKey) || $this->provider === 'log' || app()->environment('testing')) {
            Log::info(sprintf(
                '[SMS DISPATCH - LOCAL/DEV] Recipient: %s | Sender: %s | Message: "%s"',
                $to,
                $this->sender,
                $message
            ));
            return true;
        }

        try {
            // Strip '+' if needed by provider or send standard E.164 without leading spaces
            $cleanRecipient = preg_replace('/[^\d+]/', '', $to);

            $response = Http::withHeaders([
                'api-key' => $this->apiKey,
                'accept' => 'application/json',
                'content-type' => 'application/json',
            ])->timeout(10)->post('https://api.brevo.com/v3/transactionalSMS/send', [
                'sender' => substr($this->sender, 0, 11),
                'recipient' => $cleanRecipient,
                'content' => $message,
                'type' => 'transactional',
            ]);

            if ($response->successful()) {
                Log::info(sprintf('[BREVO SMS SUCCESS] Sent to %s: %s', $cleanRecipient, $response->body()));
                return true;
            }

            Log::error(sprintf('[BREVO SMS ERROR] Failed to send SMS to %s: %s', $cleanRecipient, $response->body()));
            return false;
        } catch (\Throwable $e) {
            Log::error(sprintf('[BREVO SMS EXCEPTION] Error sending SMS to %s: %s', $to, $e->getMessage()));
            return false;
        }
    }
}
