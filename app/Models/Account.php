<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_number',
        'status',
    ];

    /**
     * Users who have access to this ORDO account.
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'account_user')
            ->withPivot([
                'relationship',
                'is_administrator',
            ])
            ->withTimestamps();
    }

    /**
     * Business/legal profile of this ORDO account.
     */
    public function profile(): HasOne
    {
        return $this->hasOne(AccountProfile::class);
    }

    /**
     * Professional engagements under this account.
     */
    public function engagements(): HasMany
    {
        return $this->hasMany(Engagement::class);
    }

    /**
     * Support helpdesk tickets filed by this account.
     */
    public function supportTickets(): HasMany
    {
        return $this->hasMany(SupportTicket::class);
    }

    /**
     * Billing invoices and statements.
     */
    public function invoices(): HasMany
    {
        return $this->hasMany(BillingInvoice::class);
    }

    /**
     * Client timesheets, activities, and delivered reports.
     */
    public function activities(): HasMany
    {
        return $this->hasMany(ClientActivity::class);
    }
}