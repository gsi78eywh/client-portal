<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GovernanceRecord extends Model
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
        'status',
        'status_badge_class',
        'description',
        'metadata',
        'attachment_path',
        'attachment_name',
    ];

    protected $casts = [
        'record_date' => 'date',
        'metadata' => 'array',
    ];

    /**
     * Account this governance record belongs to.
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
     * Get formatted record date attribute.
     */
    public function getFormattedRecordDateAttribute(): ?string
    {
        return $this->record_date ? $this->record_date->format('M d, Y') : null;
    }

    /**
     * Record type human readable label.
     */
    public function getRecordTypeLabelAttribute(): string
    {
        return match ($this->record_type) {
            'entity_profile' => 'Entity Profile',
            'director_officer' => 'Director / Officer',
            'ownership' => 'Ownership Record',
            'meeting' => 'Meeting',
            'resolution' => 'Resolution',
            'corporate_record' => 'Corporate Record',
            default => ucfirst(str_replace('_', ' ', (string) $this->record_type)),
        };
    }
}
