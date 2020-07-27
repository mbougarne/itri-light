<?php

namespace App\Http\Controllers\Admin\Posts;

use App\Models\{Post, Category};
use App\Services\StoreFileService as StoreFile;
use App\Http\Requests\CreatePost;

class Create
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('default.dashboard.posts.create', ['categories' => Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePost $request)
    {
        $data = $request->validated();

        if($request->hasFile('thumbnail'))
        {
            $data['thumbnail'] = StoreFile::store($request, 'thumbnail', 'thumbnails');
        }

        if(in_array('categories', $data))
        {
            $categories = $data['categories'];
            unset($data['categories']);
        }

        $post = Post::create($data);

        if(isset($categories)) {
            $post->async($categories);
        }

        return redirect()->route('posts')->with('success', "Post has created");
    }
}
