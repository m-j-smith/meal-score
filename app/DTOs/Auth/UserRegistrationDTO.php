<?php

namespace App\DTOs\Auth;

use App\Http\Requests\Auth\RegisteredUserRequest;

final readonly class UserRegistrationDTO
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
    ) {}

    public static function fromRequest(RegisteredUserRequest $request): self
    {
        return new self(
            name: $request->string('name'),
            email: $request->string('email'),
            password: $request->string('password'),
        );
    }
}
