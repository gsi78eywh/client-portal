<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SupportTicket extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_number',
        'account_id',
        'user_id',
        'subject',
        'category',
        'priority',
        'status',
        'message',
        'last_reply_by',
        'last_reply_at',
    ];

    protected $casts = [
        'last_reply_at' => 'datetime',
    ];

    protected $appends = [
        'status_color',
        'priority_color',
        'last_reply',
    ];

    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getStatusColorAttribute(): string
    {
        return match($this->status) {
            'Resolved' => 'emerald',
            'In Progress' => 'blue',
            default => 'amber',
        };
    }

    public function getPriorityColorAttribute(): string
    {
        return match(strtolower($this->priority)) {
            'urgent', 'high' => 'rose',
            'medium' => 'amber',
            default => 'slate',
        };
    }

    public function getLastReplyAttribute(): string
    {
        return $this->last_reply_by 
            ? "Assigned to {$this->last_reply_by}" 
            : 'Assigned to JK&C Tech Desk — triage in progress';
    }

    public function scopeStatus(Builder $query, ?string $status): Builder
    {
        if (empty($status) || $status === 'all') {
            return $query;
        }

        return $query->where('status', $status);
    }
}
