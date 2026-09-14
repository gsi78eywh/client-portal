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
        'account_type',
        'verification_status',
    ];

    /**
     * Account display name attribute.
     */
    public function getNameAttribute(): ?string
    {
        return $this->profile?->legal_name ?? $this->profile?->trade_name ?? $this->account_number;
    }

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

    /**
     * Compliance records and regulatory tracking items.
     */
    public function complianceRecords(): HasMany
    {
        return $this->hasMany(ComplianceRecord::class);
    }

    /**
     * Entity & governance records under this account.
     */
    public function governanceRecords(): HasMany
    {
        return $this->hasMany(GovernanceRecord::class);
    }

    /**
     * Finance records, transactions, receivables, and payables under this account.
     */
    public function financeRecords(): HasMany
    {
        return $this->hasMany(FinanceRecord::class);
    }

    /**
     * Document records uploaded and organized under this account.
     */
    public function documentRecords(): HasMany
    {
        return $this->hasMany(DocumentRecord::class);
    }

    /**
     * Transmittal records tracked and managed under this account.
     */
    public function transmittalRecords(): HasMany
    {
        return $this->hasMany(TransmittalRecord::class);
    }

    /**
     * Human capital records (employees, HR records, attendance, leave) under this account.
     */
    public function humanCapitalRecords(): HasMany
    {
        return $this->hasMany(HumanCapitalRecord::class);
    }
}