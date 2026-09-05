<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AccountProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_id',
        'account_type',
        'legal_name',
        'trade_name',
        'tin',
        'registration_number',
        'registration_authority',
        'registration_date',
        'industry_profession',
        'primary_address',
        'business_email',
        'contact_number',
        'website',
        'logo_path',
    ];

    protected $casts = [
        'registration_date' => 'date',
    ];

    /**
     * The ORDO account this profile belongs to.
     */
    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }
}