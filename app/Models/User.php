<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /*
    |--------------------------------------------------------------------------
    | MASS ASSIGNABLE
    |--------------------------------------------------------------------------
    |
    | These are the fields that may be safely assigned when creating
    | a User during the ORDO registration process.
    |
    */

    protected $fillable = [
        'name',
        'email',
        'password',
    ];


    /*
    |--------------------------------------------------------------------------
    | HIDDEN
    |--------------------------------------------------------------------------
    |
    | These fields should never be exposed when the User model is
    | converted to an array or JSON response.
    |
    */

    protected $hidden = [
        'password',
        'remember_token',
    ];


    /*
    |--------------------------------------------------------------------------
    | CASTS
    |--------------------------------------------------------------------------
    |
    | Laravel automatically handles these attributes using the
    | appropriate PHP types.
    |
    */

    protected function casts(): array
    {
        return [

            /*
             * Email verification timestamp
             */
            'email_verified_at' => 'datetime',

            /*
             * Automatically hash passwords when assigned.
             *
             * Example:
             *
             * User::create([
             *     'name' => 'John Mark Torres',
             *     'email' => 'john@example.com',
             *     'password' => 'password',
             * ]);
             *
             * Laravel will automatically hash the password.
             */
            'password' => 'hashed',

        ];
    }


    /*
    |--------------------------------------------------------------------------
    | USER PROFILE
    |--------------------------------------------------------------------------
    |
    | Each ORDO user has one personal profile.
    |
    | Example:
    |
    | $user->profile
    |
    */

    public function profile(): HasOne
    {
        return $this->hasOne(UserProfile::class);
    }


    /*
    |--------------------------------------------------------------------------
    | ORDO ACCOUNTS
    |--------------------------------------------------------------------------
    |
    | A User may belong to one or more ORDO accounts.
    |
    | The relationship uses the account_user pivot table.
    |
    */

    public function accounts(): BelongsToMany
    {
        return $this->belongsToMany(
            Account::class,
            'account_user'
        )
        ->withPivot([
            'relationship',
            'is_administrator',
        ])
        ->withTimestamps();
    }
}