<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Models\Category;

class All
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        return view('default.dashboard.categories.index', ['categories' => Category::all()]);
    }
}
