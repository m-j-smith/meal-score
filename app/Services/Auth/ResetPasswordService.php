<?php

namespace App\Services\Auth;

use App\DTOs\Auth\ResetPasswordDTO;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ResetPasswordService
{
    public function create(ResetPasswordDTO $resetPasswordDTO): string
    {
        // Attempt to reset the user's password. If successful, update the password on
        // the user model and persist it to the database.

        /** @var string $status */
        $status = Password::reset(
            $resetPasswordDTO->toArray(),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            });

        return $status;
    }
}
