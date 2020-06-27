<?php

namespace App\Http\Controllers\Admin;

use App\Models\{Post, Contact};

class Dashboard
{
    public function __invoke()
    {
        $data = [

        ];

        return view('default.dashboard.home', $data);
    }
}
