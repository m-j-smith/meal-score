<?php

namespace App\Mail;

use App\Models\DiningTable;
use App\Models\DiningTableInvitation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DiningTableInvitationMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public readonly DiningTable $diningTable;

    /**
     * Create a new message instance.
     */
    public function __construct(
        public readonly DiningTableInvitation $invitation
    ) {
        /** @var DiningTable $diningTable */
        $diningTable = $this->invitation->diningTable;
 
        $this->diningTable = $diningTable;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "You've been invited to join {$this->diningTable->name} on Meal Score",
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        /** @var DiningTable $diningTable */
        $diningTable = $this->invitation->diningTable;

        return new Content(
            view: 'emails.dining-table-invitation',
            with: [
                'diningTableName' => $this->diningTable->name,
                'acceptUrl' => route('dining-tables.invitations.show', ['token' => $this->invitation->token]),
            ],
        );
    }
}
