<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Requests\CreateCategory;
use App\Models\Category;

class Create
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('default.dashboard.categories.create', ['title' => 'Create New Category']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CreateCategory  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategory $request)
    {
        Category::create($request->validated());
        return redirect()->route('categories')->with('success', 'Category has created');
    }
}
