<?php

namespace App\Http\Controllers\Admin;

use App\Models\{Post, Contact};

class Dashboard
{
    public function __invoke()
    {
        $data = [
            'posts' => Post::latest()->limit(5)->get(),
            'contacts' => Contact::latest()->limit(5)->get(),
        ];

        return view('default.dashboard.home', $data);
    }
}
