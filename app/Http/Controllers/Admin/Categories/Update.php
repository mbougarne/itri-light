<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Requests\UpdateCategory;
use App\Models\Category;

class Update
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('default.dashboard.categories.update', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategory  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategory $request, Category $category)
    {
        $category->update($request->validated());
        return redirect()->route('categories')->with('success', 'Category has updated');
    }
}
