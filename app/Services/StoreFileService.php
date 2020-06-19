<?php

namespace App\Services;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

class StoreFileService
{
    /**
     * Store uploaded file
     *
     * @param \Illuminate\Http\Request $request
     * @param string $disk
     * @param string $name
     * @param string $path
     * @return string
     */
    public static function store(Request $request, string $name, string $path, string $disk = 'uploads') : string
    {
        $ext = $request->file($name)->extension();
        $file_name = md5(Str::random() . time()) . '.' . $ext;

        $request->file($name)->storeAs($path, $file_name, $disk);

        return $file_name;
    }
}
