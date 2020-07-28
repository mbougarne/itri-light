<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Requests\UpdatePage;
use App\Services\StoreFileService as StoreFile;
use App\Models\Page;

class Update
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        return view('default.dashboard.pages.update', [
                'title' => 'Create New Page',
                'page' => $page,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePage  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePage $request, Page $page)
    {
        $data = $request->validated();

        if($request->hasFile('thumbnail'))
        {
            $data['thumbnail'] = StoreFile::store($request, 'thumbnail', 'thumbnails');
        }

        $page->update($data);

        return redirect()->route('pages')->with('success', 'Page has updated');
    }
}
