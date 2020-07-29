<?php

namespace App\Http\Controllers\Admin\Contacts;

use App\Models\Contact;

class All
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        return view('default.dashboard.contacts.index', [
                'title' => 'Received Messages',
                'contacts' => Contact::paginate()
            ]);
    }
}
