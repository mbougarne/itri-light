<?php

namespace App\Http\Controllers\Admin\Contacts;

use App\Http\Requests\CreateContact;
use App\Models\Contact;

class Create
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
