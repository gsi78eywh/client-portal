<?php

namespace Tests\Unit;

use App\Mail\ContactVerificationMail;
use App\Services\Contact\BrevoEmailService;
use App\Services\Contact\EmailVerificationServiceInterface;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class BrevoEmailServiceTest extends TestCase
{
    public function test_implements_email_verification_service_interface(): void
    {
        $service = new BrevoEmailService();
        $this->assertInstanceOf(EmailVerificationServiceInterface::class, $service);
    }

    public function test_dispatches_contact_verification_mail_and_returns_true(): void
    {
        Mail::fake();

        $service = new BrevoEmailService();
        $success = $service->sendVerificationEmail('client@example.com', '123456', 'Jane Doe');

        $this->assertTrue($success);

        Mail::assertSent(ContactVerificationMail::class, function ($mail) {
            return $mail->hasTo('client@example.com') &&
                $mail->otp === '123456' &&
                $mail->recipientName === 'Jane Doe';
        });
    }

    public function test_returns_false_and_sanitizes_credentials_on_failure(): void
    {
        Mail::shouldReceive('to')
            ->once()
            ->with('client@example.com')
            ->andThrow(new \Exception('SMTP connection failed with key xkeysib-1234567890abcdef and Bearer secret-token-123'));

        Log::shouldReceive('error')
            ->once()
            ->withArgs(function ($message) {
                // Must not expose raw API key or token
                $containsRawKey = str_contains($message, 'xkeysib-1234567890abcdef');
                $containsRawToken = str_contains($message, 'secret-token-123');
                $hasRedactedKey = str_contains($message, '[REDACTED_API_KEY]');
                $hasRedactedBearer = str_contains($message, 'Bearer [REDACTED]');

                return !$containsRawKey && !$containsRawToken && $hasRedactedKey && $hasRedactedBearer;
            });

        $service = new BrevoEmailService();
        $result = $service->sendVerificationEmail('client@example.com', '654321', 'Jane Doe');

        $this->assertFalse($result);
    }
}
