<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HumanCapitalRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_id',
        'user_id',
        'record_type',
        'reference_no',
        'title',
        'category',
        'record_date',
        'end_date',
        'status',
        'status_badge_class',
        'description',
        'metadata',
        'attachment_path',
        'attachment_name',
    ];

    protected $casts = [
        'record_date' => 'date',
        'end_date' => 'date',
        'metadata' => 'array',
    ];

    /**
     * Account this human capital record belongs to.
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
     * Formatted record date (e.g. Sep 08, 2026).
     */
    public function getFormattedRecordDateAttribute(): ?string
    {
        return $this->record_date ? $this->record_date->format('M d, Y') : null;
    }

    /**
     * Formatted end date (e.g. Sep 10, 2026).
     */
    public function getFormattedEndDateAttribute(): ?string
    {
        return $this->end_date ? $this->end_date->format('M d, Y') : null;
    }

    /**
     * Record type human-readable label.
     */
    public function getRecordTypeLabelAttribute(): string
    {
        return match ($this->record_type) {
            'employee' => 'Employee',
            'hr_document' => 'HR Document',
            'attendance' => 'Attendance',
            'leave' => 'Leave',
            default => ucfirst(str_replace('_', ' ', (string) $this->record_type)),
        };
    }
}
