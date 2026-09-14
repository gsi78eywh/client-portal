<?php

namespace App\Services\Contact;

class ContactMaskingService
{
    /**
     * Mask email address for secure display.
     * Example: maria@domain.com -> m••••@domain.com
     * Example: m.something@student.passerellesnumeriques.org -> m••••••••••@student.passerellesnumeriques.org
     */
    public static function maskEmail(string $email): string
    {
        $parts = explode('@', trim($email));
        if (count($parts) !== 2) {
            return $email;
        }

        $user = $parts[0];
        $domain = $parts[1];

        $len = strlen($user);
        if ($len <= 1) {
            return $user . '••••@' . $domain;
        }

        $firstChar = substr($user, 0, 1);
        $maskCount = max(4, $len - 1);
        $maskedUser = $firstChar . str_repeat('•', $maskCount);

        return $maskedUser . '@' . $domain;
    }
}
