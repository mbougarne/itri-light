<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Contact;

class ContactCreated extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Contact message details
     *
     * @var \App\Models\Contact
     */
    protected Contact $contact;

    /**
     * Create a new message instance.
     *
     * @param App\Models\Contact $contact
     * @return void
     */
    public function __construct(Contact $contact)
    {
        $this->contact =  $contact;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from( $this->contact->email, env('MAIL_FROM_NAME') )
                ->to(app_admin_email())
                ->subject($this->contact->subject)
                ->markdown('emails.contacts.created', ['contact' => $this->contact]);
    }
}
