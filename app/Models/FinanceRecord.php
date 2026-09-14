<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FinanceRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_id',
        'user_id',
        'record_type',
        'reference_no',
        'title',
        'category',
        'amount',
        'currency',
        'record_date',
        'due_date',
        'status',
        'status_badge_class',
        'description',
        'metadata',
        'attachment_path',
        'attachment_name',
    ];

    protected $casts = [
        'record_date' => 'date',
        'due_date' => 'date',
        'amount' => 'decimal:2',
        'metadata' => 'array',
    ];

    /**
     * Account this finance record belongs to.
     */
    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }

    /**
     * User who created or maintains this record.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Formatted record date (e.g. Aug 18, 2026).
     */
    public function getFormattedRecordDateAttribute(): ?string
    {
        return $this->record_date ? $this->record_date->format('M d, Y') : null;
    }

    /**
     * Formatted due date (e.g. Sep 18, 2026).
     */
    public function getFormattedDueDateAttribute(): ?string
    {
        return $this->due_date ? $this->due_date->format('M d, Y') : null;
    }

    /**
     * Formatted amount with currency symbol (e.g. ₱225,000.00).
     */
    public function getFormattedAmountAttribute(): string
    {
        $amt = (float) ($this->amount ?? 0);
        $curr = $this->currency === 'USD' ? '$' : '₱';
        return $curr . number_format($amt, 2);
    }

    /**
     * Record type human-readable label.
     */
    public function getRecordTypeLabelAttribute(): string
    {
        return match ($this->record_type) {
            'receivable' => 'Receivable',
            'payable' => 'Payable',
            'expense' => 'Expense',
            'transaction' => 'Transaction',
            'request' => 'Request',
            'finance_record' => 'Finance Record',
            default => ucfirst(str_replace('_', ' ', (string) $this->record_type)),
        };
    }
}
