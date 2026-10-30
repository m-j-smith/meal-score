<?php

namespace App\Models;

use Database\Factories\DiningTableInvitationFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['dining_table_id', 'invited_by_user_id', 'email', 'token'])]
#[Hidden(['token'])]
class DiningTableInvitation extends Model
{
    /** @use HasFactory<DiningTableInvitationFactory> */
    use HasFactory;

    // =========================================================================
    // #region Configuration & Setup
    // =========================================================================
    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'accepted_at' => 'datetime',
        ];
    }
    // #endregion

    // =========================================================================
    // #region Relationships
    // =========================================================================
    /**
     * @return BelongsTo<DiningTable, $this>
     */
    public function diningTable(): BelongsTo
    {
        return $this->belongsTo(DiningTable::class);
    }

    /**
     * @return BelongsTo<User, $this>
     */
    public function invitedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'invited_by_user_id');
    }
    // #endregion

    // =========================================================================
    // #region Model State
    // =========================================================================
    /**
     * Whether the invited user has accepted the invitation to this dining table
     */
    public function isAccepted(): bool
    {
        return ! is_null($this->accepted_at);
    }

    /**
     * Whether the invitation is for the given email address
     */
    public function isForEmail(string $email): bool
    {
        return strcasecmp($this->email, $email) === 0;
    }
    // #endregion
}
