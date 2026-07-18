<?php

namespace App\Services\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Registered;

class UserService
{
    public function create(array $userData)
    {
        $user = User::create($userData);

        event(new Registered($user));

        return $user;
    }
}
