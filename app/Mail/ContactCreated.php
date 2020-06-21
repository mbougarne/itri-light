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
        return $this->from( env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME') )
                ->to(env('MAIL_ADMIN_ADDRESS'))
                ->subject($this->contact->subject)
                ->markdown('emails.contacts.created', ['contact' => $this->contact]);
    }
}
