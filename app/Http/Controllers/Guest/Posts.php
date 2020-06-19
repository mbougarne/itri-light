<?php

namespace App\Http\Controllers\Guest;

use App\Models\{Post, Category};

class Posts
{
    public function single(Post $post)
    {
        $data = [
            'post' => $post,
            'related' => Post::all()->random(3)
        ];

        return view('default.front.posts.single', $data);
    }

    /**
     * Undocumented function
     *
     * @param Category $category
     * @return void
     */
    public function category(Category $category)
    {
        return view('default.front.posts.category', ['category' => $category]);
    }
}
