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
        return view('default.dashboard.posts.create', [
                'title' => 'Create New Post',
                'categories' => Category::all()
            ]);
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

        if($request->has('categories'))
        {
            $categories = $data['categories'];
            unset($data['categories']);

            $post = Post::create($data);

            $post->categories()->sync($categories);

        } else {

            Post::create($data);

        }

        return redirect()->route('posts')->with('success', "Post has created");
    }
}
