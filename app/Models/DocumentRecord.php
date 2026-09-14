<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DocumentRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_id',
        'user_id',
        'record_no',
        'title',
        'classification',
        'subclass',
        'source',
        'document_number',
        'record_date',
        'status',
        'status_badge_class',
        'ocr_status',
        'ocr_summary',
        'description',
        'tags',
        'metadata',
        'file_path',
        'file_name',
        'file_size_bytes',
        'file_type',
    ];

    protected $casts = [
        'record_date' => 'date',
        'tags' => 'array',
        'metadata' => 'array',
        'file_size_bytes' => 'integer',
    ];

    /**
     * Account this document record belongs to.
     */
    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }

    /**
     * User who uploaded/created this record.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Formatted record date (e.g. August 18, 2026).
     */
    public function getFormattedRecordDateAttribute(): ?string
    {
        return $this->record_date ? $this->record_date->format('F d, Y') : null;
    }

    /**
     * Formatted human-readable file size (e.g. 2.4 MB, 540 KB).
     */
    public function getFormattedFileSizeAttribute(): string
    {
        $bytes = (int) ($this->file_size_bytes ?? 0);
        if ($bytes <= 0) {
            return '—';
        }
        if ($bytes >= 1048576) {
            return round($bytes / 1048576, 1) . ' MB';
        }
        if ($bytes >= 1024) {
            return round($bytes / 1024) . ' KB';
        }
        return $bytes . ' B';
    }
}
