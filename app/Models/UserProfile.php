<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'middle_name',
        'last_name',
        'suffix',
        'date_of_birth',
        'gender',
        'country_region',
        'mobile_number',
        'profile_photo_path',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
    ];

    /**
     * The user who owns this personal profile.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}