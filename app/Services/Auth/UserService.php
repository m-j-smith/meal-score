<?php

namespace App\Services\Auth;

use App\DTOs\Auth\UserRegistrationDTO;
use App\Models\User;
use Illuminate\Auth\Events\Registered;

class UserService
{
    public function create(UserRegistrationDTO $userData): User
    {
        $user = User::create([
            'name' => $userData->name,
            'email' => $userData->email,
            'password' => $userData->password,
        ]);

        event(new Registered($user));

        return $user;
    }
}
