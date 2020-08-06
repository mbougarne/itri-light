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
            'description' => 'The blog post',
            'posts' => Post::paginate(9)
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
            'title' => $post->title,
            'description' => $post->description,
            'related' => Post::where('id', '!=', $post->id)->get()->random(3)
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
        return view('default.front.posts.category', [
                'title' => 'Posts of ' . $category->name,
                'description' => 'Posts of ' . $category->name . ' category',
                'posts' => $category->posts()->paginate(9)
            ]);
    }
}
