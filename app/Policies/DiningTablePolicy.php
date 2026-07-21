<?php

namespace App\Policies;

use App\Models\DiningTable;
use App\Models\User;

class DiningTablePolicy
{
    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, DiningTable $diningTable): bool
    {
        return $diningTable->hasMember($user);
    }

    /**
     * Determine whether the user can create the model.
     */
    public function create(): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, DiningTable $diningTable): bool
    {
        return $user->ownsDiningTable($diningTable);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, DiningTable $diningTable): bool
    {
        return $user->ownsDiningTable($diningTable);
    }

    /**
     * Determine whether the user can leave the table.
     */
    public function leave(User $user, DiningTable $diningTable): bool
    {
        return $diningTable->hasMember($user) && ! $user->ownsDiningTable($diningTable);
    }
}
