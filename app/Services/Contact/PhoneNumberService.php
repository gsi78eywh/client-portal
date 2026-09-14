<?php

namespace App\Services\Contact;

class PhoneNumberService
{
    /**
     * Normalize phone numbers (specifically Philippine numbers) to E.164 international format (+639XXXXXXXXX).
     */
    public static function normalize(string $phoneNumber): string
    {
        // Strip spaces, hyphens, dots, parentheses
        $cleaned = preg_replace('/[^\d+]/', '', trim($phoneNumber));

        if (empty($cleaned)) {
            return '';
        }

        // 09XXXXXXXXX (11 digits starting with 09)
        if (preg_match('/^0(9\d{9})$/', $cleaned, $matches)) {
            return '+63' . $matches[1];
        }

        // 9XXXXXXXXX (10 digits starting with 9)
        if (preg_match('/^(9\d{9})$/', $cleaned, $matches)) {
            return '+63' . $matches[1];
        }

        // 639XXXXXXXXX (12 digits starting with 639)
        if (preg_match('/^63(9\d{9})$/', $cleaned, $matches)) {
            return '+63' . $matches[1];
        }

        // +639XXXXXXXXX
        if (preg_match('/^\+63(9\d{9})$/', $cleaned, $matches)) {
            return '+63' . $matches[1];
        }

        // Generic international fallback: ensure leading '+'
        if (!str_starts_with($cleaned, '+')) {
            return '+' . $cleaned;
        }

        return $cleaned;
    }

    /**
     * Mask normalized phone number for display.
     * Example: +639491902119 -> +63 949 ••• ••19
     */
    public static function mask(string $phoneNumber): string
    {
        $normalized = self::normalize($phoneNumber);

        // Pattern for +639XXXXXXXXX (13 chars)
        if (preg_match('/^\+63(9\d{2})(\d{3})(\d{2})(\d{2})$/', $normalized, $matches)) {
            // matches[1]: 949
            // matches[2]: 190 (3 digits)
            // matches[3]: 21  (2 digits)
            // matches[4]: 19  (last 2 digits)
            return '+63 ' . $matches[1] . ' ••• ••' . $matches[4];
        }

        // Fallback generic masking
        $len = strlen($normalized);
        if ($len > 6) {
            $prefix = substr($normalized, 0, 4);
            $suffix = substr($normalized, -2);
            $middleCount = $len - 6;
            return $prefix . ' ' . str_repeat('•', $middleCount) . ' ' . $suffix;
        }

        return $normalized;
    }
}
