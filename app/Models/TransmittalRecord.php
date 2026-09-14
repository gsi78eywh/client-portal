<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TransmittalRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_id',
        'user_id',
        'transmittal_no',
        'title',
        'type',
        'sender',
        'recipient',
        'transmittal_date',
        'delivery_method',
        'delivery_date',
        'status',
        'status_badge_class',
        'description',
        'acknowledged_by',
        'acknowledged_at',
        'proof_of_receipt_note',
        'proof_of_receipt_path',
        'attachments',
        'metadata',
    ];

    protected $casts = [
        'transmittal_date' => 'date',
        'delivery_date' => 'date',
        'acknowledged_at' => 'date',
        'attachments' => 'array',
        'metadata' => 'array',
    ];

    protected $appends = [
        'formatted_transmittal_date',
        'formatted_delivery_date',
        'formatted_acknowledged_at',
        'proof_of_receipt',
    ];

    public function getProofOfReceiptAttribute(): ?string
    {
        return $this->proof_of_receipt_path;
    }

    /**
     * Account this transmittal record belongs to.
     */
    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }

    /**
     * User who dispatched or logged this transmittal.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Formatted transmittal date (e.g. August 18, 2026).
     */
    public function getFormattedTransmittalDateAttribute(): ?string
    {
        return $this->transmittal_date ? $this->transmittal_date->format('F d, Y') : null;
    }

    /**
     * Formatted delivery date (e.g. August 18, 2026).
     */
    public function getFormattedDeliveryDateAttribute(): ?string
    {
        return $this->delivery_date ? $this->delivery_date->format('F d, Y') : null;
    }

    /**
     * Formatted acknowledgment date (e.g. August 19, 2026).
     */
    public function getFormattedAcknowledgedAtAttribute(): ?string
    {
        return $this->acknowledged_at ? $this->acknowledged_at->format('F d, Y') : null;
    }
}
