<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactVerification extends Model
{
    use HasFactory;

    protected $fillable = [
        'channel',
        'destination',
        'otp_code',
        'attempts',
        'max_attempts',
        'expires_at',
        'resend_available_at',
        'verified_at',
        'session_id',
    ];

    protected $casts = [
        'attempts' => 'integer',
        'max_attempts' => 'integer',
        'expires_at' => 'datetime',
        'resend_available_at' => 'datetime',
        'verified_at' => 'datetime',
    ];

    public function isExpired(): bool
    {
        return now()->isAfter($this->expires_at);
    }

    public function isMaxAttemptsReached(): bool
    {
        return $this->attempts >= $this->max_attempts;
    }

    public function isVerified(): bool
    {
        return !is_null($this->verified_at);
    }

    public function canResend(): bool
    {
        return now()->isAfter($this->resend_available_at);
    }

    public function resendRemainingSeconds(): int
    {
        if ($this->canResend()) {
            return 0;
        }

        return max(0, now()->diffInSeconds($this->resend_available_at, false));
    }
}
