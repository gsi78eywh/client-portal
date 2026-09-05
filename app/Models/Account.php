<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
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
}