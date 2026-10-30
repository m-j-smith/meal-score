<?php

namespace App\DTOs\DiningTable;

use App\Http\Requests\DiningTableInvitationRequest;
use App\Models\DiningTable;
use App\Models\User;

final readonly class InviteMemberDTO
{
    public function __construct(
        public DiningTable $diningTable,
        public string $email,
        public int $invitedByUserId,
    ) {}

    public static function fromRequest(DiningTableInvitationRequest $request): self
    {
        /** @var User $user */
        $user = $request->user();

        /** @var DiningTable $diningTable */
        $diningTable = $request->route('diningTable');

        return new self(
            diningTable: $diningTable,
            email: $request->string('email')->toString(),
            invitedByUserId: $user->id,
        );
    }
}
