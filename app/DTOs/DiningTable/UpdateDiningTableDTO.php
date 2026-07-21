<?php

namespace App\DTOs\DiningTable;

use App\Http\Requests\DiningTableRequest;

final readonly class UpdateDiningTableDTO
{
    public function __construct(
        public string $name,
    ) {}

    public static function fromRequest(DiningTableRequest $request): self
    {
        return new self(
            name: $request->string('name')->toString(),
        );
    }
}
