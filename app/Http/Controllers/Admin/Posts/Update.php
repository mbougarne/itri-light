<?php

namespace App\Http\Controllers\Admin\Posts;

use App\Http\Requests\UpdatePost;
use App\Models\{Post, Category};
use App\Http\Requests\UpdateUser;
use App\Services\StoreFileService as StoreFile;

class Update
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('default.dashboard.posts.update', [
                'post' => $post,
                'title' => 'Update ' . $post->title,
                'categories_ids' => $post->categories()->allRelatedIds()->toArray(),
                'categories' => Category::all()
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUser  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePost $request, Post $post)
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
            $post->categories()->sync($categories);
        }

        $post->update($data);

        return redirect()->route('posts')->with('success', "Post has updated");
    }
}
