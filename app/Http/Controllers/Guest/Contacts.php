<?php

namespace App\Http\Controllers\Guest;

use App\Http\Requests\CreateContact;
use App\Models\Contact;

class Contacts
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CreateContact  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(CreateContact $request)
    {
        Contact::create($request->validated());
        return redirect()->back()->with('success', 'Thank You!!! We received your message');
    }
}
