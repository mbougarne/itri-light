<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Requests\CreatePage;
use App\Services\StoreFileService as StoreFile;
use App\Models\Page;

class Create
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('default.dashboard.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CreatePage  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePage $request)
    {
        $data = $request->validated();

        if($request->hasFile('thumbnail'))
        {
            $data['thumbnail'] = StoreFile::store($request, 'thumbnail', 'thumbnails');
        }

        Page::create($data);

        return redirect()->route('pages')->with('success', "Page has created");
    }
}
