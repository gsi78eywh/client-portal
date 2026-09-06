<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BillingInvoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_id',
        'invoice_number',
        'description',
        'period',
        'issued_date',
        'due_date',
        'amount',
        'status',
        'paid_at',
    ];

    protected $casts = [
        'issued_date' => 'date',
        'due_date' => 'date',
        'paid_at' => 'date',
        'amount' => 'decimal:2',
    ];

    protected $appends = [
        'invoice_no',
        'issue_date',
        'engagement',
    ];

    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }

    public function getInvoiceNoAttribute(): string
    {
        return $this->invoice_number ?? ('INV-' . $this->id);
    }

    public function getIssueDateAttribute(): string
    {
        return $this->issued_date ? $this->issued_date->format('M d, Y') : '';
    }

    public function getEngagementAttribute(): string
    {
        return $this->period ?? 'Retainer';
    }

    public function scopeUnpaid(Builder $query): Builder
    {
        return $query->where('status', 'Pending Payment');
    }

    public function scopePaid(Builder $query): Builder
    {
        return $query->where('status', 'Paid');
    }
}
