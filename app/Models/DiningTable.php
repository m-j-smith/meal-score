<?php

namespace App\Models;

use Database\Factories\DiningTableFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

#[Fillable(['name', 'invite_code'])]
class DiningTable extends Model
{
    /** @use HasFactory<DiningTableFactory> */
    use HasFactory;

    // =========================================================================
    // #region Booting
    // =========================================================================
    protected static function booted(): void
    {
        static::creating(function (DiningTable $diningTable) {
            if (empty($diningTable->invite_code)) {
                $diningTable->invite_code = static::generateUniqueInviteCode();
            }
        });
    }
    // #endregion

    // =========================================================================
    // #region Relationships
    // =========================================================================
    /**
     * @return BelongsToMany<User, $this>
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'dining_table_user')
            ->withPivot(['is_owner', 'is_guest'])
            ->withTimestamps();
    }
    // #endregion

    // =========================================================================
    // #region Model State
    // =========================================================================
    /**
     * Whether the passed user is a member of this dining table
     */
    public function hasMember(User $user): bool
    {
        return $this->users()->where('users.id', $user->id)->exists();
    }

    // =========================================================================
    // #region Helpers
    // =========================================================================
    protected static function generateUniqueInviteCode(): string
    {
        do {
            $inviteCode = strtoupper(Str::random(8));
        } while (static::where('invite_code', $inviteCode)->exists());

        return $inviteCode;
    }
    // #endregion
}
