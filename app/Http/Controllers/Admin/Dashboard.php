<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\{Post, Contact};
use App\Services\StoreFileService as StoreFile;

class Dashboard
{
    public function home()
    {
        $data = [
            'posts' => Post::latest()->limit(5)->get(),
            'contacts' => Contact::latest()->limit(5)->get(),
        ];

        return view('default.dashboard.home', $data);
    }

    public function uploadImage(Request $request)
    {
        if($request->hasFile('upload_image'))
        {
            $image = StoreFile::store($request, 'upload_image', $request->location . '/');

            return response()->json([
                'success' => true,
                'msg' => 'Image has been saved',
                'image' => $image,
                'path' => asset("uploads/{$request->location}/" . $image)
            ], 201);

        }

        return response()->json([
            'success' => false,
            'error' => 'Ops! There is an issue. Please try again later!',
        ],500);
    }
}
