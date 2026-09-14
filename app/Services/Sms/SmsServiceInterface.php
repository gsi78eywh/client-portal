<?php

namespace App\Services\Sms;

interface SmsServiceInterface
{
    /**
     * Send an SMS message to a normalized international phone number.
     *
     * @param string $to Normalized E.164 phone number (e.g. +639491902119)
     * @param string $message The message content
     * @return bool True if sent or accepted for delivery
     */
    public function sendSms(string $to, string $message): bool;
}
