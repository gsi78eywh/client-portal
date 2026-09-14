<?php

namespace App\Services\Contact;

interface EmailVerificationServiceInterface
{
    /**
     * Send a verification email containing the 6-digit OTP.
     *
     * @param string $recipientEmail
     * @param string $otp
     * @param string $recipientName
     * @return bool True if successfully dispatched or safely handled in fallback
     */
    public function sendVerificationEmail(string $recipientEmail, string $otp, string $recipientName = 'Client'): bool;
}
