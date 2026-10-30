<?php

namespace App\Services;

use App\DTOs\DiningTable\InviteMemberDTO;
use App\Mail\DiningTableInvitationMail;
use App\Models\DiningTableInvitation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class DiningTableInvitationService
{
    public function invite(InviteMemberDTO $dto): DiningTableInvitation
    {
        $invitation = DB::transaction(function () use ($dto) {
            return DiningTableInvitation::updateOrCreate([
                'dining_table_id' => $dto->diningTable->id,
                'email' => $dto->email,
            ],
                [
                    'invited_by_user_id' => $dto->invitedByUserId,
                    'token' => Str::random(64),
                ]);
        });

        Mail::to($invitation->email)->send(new DiningTableInvitationMail($invitation));

        return $invitation;
    }
}
