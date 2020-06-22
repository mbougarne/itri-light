<?php

namespace App\Http\Controllers\Admin\Posts;

use App\Models\Post;

class All
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        return view('default.dashboard.posts.index', ['posts' => Post::all()]);
    }
}
