<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Models\Page;

class All
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        return view('default.dashboard.pages.index', ['pages' => Page::all()]);
    }
}
