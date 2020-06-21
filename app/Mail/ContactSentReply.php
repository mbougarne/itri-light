<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactSentReply extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     *
     */
    protected array $reply;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $reply)
    {
        $this->reply = $reply;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('')
                    ->subject($this->reply['subject'])
                    ->markdown('emails.contacts.reply', $this->reply);
    }
}
