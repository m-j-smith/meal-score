<?php

namespace App\DTOs\Auth;

use App\Http\Requests\Auth\ResetPasswordRequest;

final readonly class ResetPasswordDTO
{
    public function __construct(
        public string $email,
        public string $password,
        public string $password_confirmation,
        public string $token,
    ) {}

    public static function fromRequest(ResetPasswordRequest $request): self
    {
        return new self(
            email: $request->string('email'),
            password: $request->string('password'),
            password_confirmation: $request->string('password_confirmation'),
            token: $request->string('token')
        );
    }

    /**
     * Formats the DTO as an array for use with the Laravel Password::reset method.
     *
     * @return array{email: string, password: string, password_confirmation: string, token: string}
     */
    public function toArray(): array
    {
        return [
            'email' => $this->email,
            'password' => $this->password,
            'password_confirmation' => $this->password_confirmation,
            'token' => $this->token,
        ];
    }
}
