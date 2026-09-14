<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ComplianceRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_id',
        'user_id',
        'reference_no',
        'title',
        'agency',
        'category',
        'frequency',
        'effective_date',
        'due_date',
        'responsible_person',
        'status',
        'description',
        'attachment_path',
        'attachment_name',
    ];

    protected $casts = [
        'effective_date' => 'date',
        'due_date' => 'date',
    ];

    protected $appends = [
        'formatted_due_date',
        'formatted_effective_date',
        'status_badge_class',
    ];

    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getFormattedDueDateAttribute(): string
    {
        return $this->due_date ? $this->due_date->format('M d, Y') : '';
    }

    public function getFormattedEffectiveDateAttribute(): ?string
    {
        return $this->effective_date ? $this->effective_date->format('M d, Y') : null;
    }

    public function getStatusBadgeClassAttribute(): string
    {
        return match (strtolower(trim((string) ($this->status ?? '')))) {
            'due soon', 'due' => 'due',
            'scheduled' => 'scheduled',
            'monitoring' => 'monitoring',
            'compliant', 'completed', 'active' => 'compliant',
            default => 'scheduled',
        };
    }

    public function scopeForAccount(Builder $query, int $accountId): Builder
    {
        return $query->where('account_id', $accountId);
    }

    public function scopeAgency(Builder $query, string $agency): Builder
    {
        return $query->where('agency', $agency);
    }
}
