<?php

namespace App\Http\Controllers\Admin\Posts;

use App\Models\Post;

class Delete
{
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Post $post)
    {
        $post->delete();

        return redirect()->route('posts')->with('success', 'Post has deleted');
    }
}
