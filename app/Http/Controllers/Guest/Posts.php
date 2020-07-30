<?php

namespace App\Http\Controllers\Guest;

use App\Models\{Post, Category};

class Posts
{
    /**
     * All post
     *
     * @return \Illuminate\Http\Response
     */
    public function blog()
    {
        return view('default.front.posts.blog', [
            'title' => 'Blog',
            'posts' => Post::paginate(12)->with('categories')
        ]);
    }

    /**
     * Single post
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function single(Post $post)
    {
        $data = [
            'post' => $post,
            'related' => Post::all()->random(3)
        ];

        return view('default.front.posts.single', $data);
    }

    /**
     * Category posts
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function category(Category $category)
    {
        return view('default.front.posts.category', ['category' => $category]);
    }
}
