<?php

namespace App\Observers;

use App\Models\Contact;
use App\Jobs\ContactCreated;

class ContactObserver
{
    /**
     * Handle the contact "created" event.
     *
     * @param  \App\Models\Contact  $contact
     * @return void
     */
    public function created(Contact $contact)
    {
        dispatch(new ContactCreated($contact))->delay(now()->addSeconds(30));
    }
}
