<?php

namespace App\Http\Controllers\Admin\Posts;

use App\Models\Post;
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
        return view('default.dashboard.posts.update', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUser  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser $request, Post $post)
    {
        $data = $request->validated();

        if($request->hasFile('thumbnail'))
        {
            $data['thumbnail'] = StoreFile::store($request, 'thumbnail', 'thumbnails');
        }

        $post->update($data);

        return redirect()->route('posts')->with('success', "Post has updated");
    }
}
