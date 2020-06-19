<?php

namespace App\Http\Controllers\Guest;

use App\Models\{Page, Post};

class Pages
{
    /**
     * Get home page
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $data = [
                'posts' => Post::paginate(),
                'page' => Page::firstWhere('slug', 'home')
            ];
        return view('default.front.pages.home', $data);
    }

    /**
     * Get single page
     *
     * @param App\Models\Page $page
     * @return \Illuminate\Http\Response
     */
    public function single(Page $page)
    {
        return view('default.front.pages.single', ['page' => $page]);
    }

    /**
     * Get single page
     *
     * @param App\Models\Page $page
     * @return \Illuminate\Http\Response
     */
    public function contact(Page $page)
    {
        return view('default.front.pages.contact', ['page' => $page]);
    }
}
