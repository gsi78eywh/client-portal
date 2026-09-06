<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClientActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_id',
        'user_id',
        'activity_date',
        'engagement_code',
        'title',
        'consultant_name',
        'hours_spent',
        'is_billable',
        'type',
        'deliverable_name',
        'status',
    ];

    protected $casts = [
        'activity_date' => 'date',
        'hours_spent' => 'decimal:2',
        'is_billable' => 'boolean',
    ];

    protected $appends = [
        'date',
        'activity',
        'engagement',
        'duration',
        'specialist',
        'outcome',
    ];

    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getDateAttribute(): string
    {
        return $this->activity_date ? $this->activity_date->format('M d, Y') : '';
    }

    public function getActivityAttribute(): string
    {
        return $this->title;
    }

    public function getEngagementAttribute(): string
    {
        return $this->engagement_code ?? 'Retainer';
    }

    public function getDurationAttribute(): string
    {
        $hours = floor((float) $this->hours_spent);
        $mins = round(((float) $this->hours_spent - $hours) * 60);
        return "{$hours}h {$mins}m";
    }

    public function getSpecialistAttribute(): string
    {
        return $this->consultant_name ?? 'JK&C Consultant';
    }

    public function getOutcomeAttribute(): string
    {
        return $this->deliverable_name ?? 'Delivered & Documented';
    }

    public function scopeActivities(Builder $query): Builder
    {
        return $query->where('type', 'activity');
    }

    public function scopeReports(Builder $query): Builder
    {
        return $query->where('type', 'report');
    }
}
