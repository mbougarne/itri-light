<?php

namespace App\Http\Controllers\Admin\Contacts;

use App\Models\Contact;

class Single
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Contact $contact)
    {
        if(!$contact->is_read) $contact->update(['is_read' => 1]);
        return view('default.dashboard.contacts.single', [
                    'contact' => $contact,
                    'title' => $contact->subject,
                    'description' => 'Message with subject ' . $contact->subject
                ]);
    }
}
