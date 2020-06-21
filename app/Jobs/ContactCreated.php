<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactCreated as ReceivedMail;
use App\Models\Contact;

class ContactCreated implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Contact model
     *
     * @var \App\Models\Contact
     */
    protected Contact $contact;

    /**
     * Create a new job instance.
     *
     * @param \App\Models\Contact $contact
     * @return void
     */
    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::send(new ReceivedMail($this->contact));
    }
}
