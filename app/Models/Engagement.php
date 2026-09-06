<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Engagement extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_id',
        'code',
        'title',
        'category',
        'lead_partner',
        'period',
        'scope',
        'progress',
        'status',
        'status_color',
        'deliverables',
        'billing_ref',
    ];

    protected $casts = [
        'progress' => 'integer',
    ];

    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }

    /**
     * Scope to filter engagements by status.
     */
    public function scopeStatus(Builder $query, ?string $status): Builder
    {
        if (empty($status) || strtolower($status) === 'all') {
            return $query;
        }

        $normalized = str_replace('_', ' ', strtolower(trim($status)));

        return $query->whereRaw('LOWER(status) = ?', [$normalized]);
    }
}
