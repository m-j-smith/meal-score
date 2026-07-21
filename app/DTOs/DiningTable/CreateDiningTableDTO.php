<?php

namespace App\DTOs\DiningTable;

use App\Http\Requests\DiningTableRequest;
use App\Models\User;

final readonly class CreateDiningTableDTO
{
    public function __construct(
        public string $name,
        public int $ownerId,
    ) {}

    public static function fromRequest(DiningTableRequest $request): self
    {
        /** @var User $user */
        $user = $request->user();

        return new self(
            name: $request->string('name')->toString(),
            ownerId: $user->id,
        );
    }
}
