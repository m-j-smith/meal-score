<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable implements CanResetPassword, MustVerifyEmail
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    // =========================================================================
    // #region Configuration & Setup
    // =========================================================================

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    // #endregion

    // =========================================================================
    // #region Relationships
    // =========================================================================
    /**
     * @return BelongsToMany<DiningTable, $this>
     */
    public function diningTables(): BelongsToMany
    {
        return $this->belongsToMany(DiningTable::class, 'dining_table_user')
            ->withPivot(['is_owner', 'is_guest'])
            ->withTimestamps();
    }
    // #endregion

    // =========================================================================
    // #region Model State
    // =========================================================================
    /**
     * Whether this is a guest user (no email or password, cannot log in)
     */
    public function isGuest(): bool
    {
        return is_null($this->email);
    }

    /**
     * Whether the user is the owner of the given dining table
     */
    public function ownsDiningTable(DiningTable $diningTable): bool
    {
        return $this->diningTables()
            ->wherePivot('dining_table_id', $diningTable->id)
            ->wherePivot('is_owner', true)
            ->exists();
    }
    // #endregion
}
