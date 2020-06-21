<?php

namespace App\Http\Controllers\Admin\Contacts;

use App\Models\Contact;
use App\Http\Requests\SendReplyMessage;
use App\Jobs\ContactReply;

class Reply
{
    /**
     * Display the specified resource.
     *
     * @param \App\Http\Requests\SendReplyMessage $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function __invoke(SendReplyMessage $request, Contact $contact)
    {
        dispatch(new ContactReply($request->validated(), $contact->email))
            ->delay(now()->addSeconds(30));

        return redirect()->route('contacts')->with('success', 'Message has sent');
    }
}
