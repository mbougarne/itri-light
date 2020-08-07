<?php

namespace App\Http\Controllers\Guest;

use App\Models\{Page, Post, User};

class Pages
{
    /**
     * Get home page
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('default.front.pages.home', [
            'title' => 'Home',
            'description' => 'Latest posts',
            'posts' => Post::paginate(12),
            'page' => Page::firstWhere('slug', 'home'),
        ]);
    }

    /**
     * Get single page
     *
     * @param App\Models\Page $page
     * @return \Illuminate\Http\Response
     */
    public function single(Page $page)
    {
        return view('default.front.pages.single', [
                'title' => $page->title ?? $page->name,
                'page' => $page
            ]);
    }

    /**
     * Get single page
     *
     * @return \Illuminate\Http\Response
     */
    public function contact()
    {
        Page::firstWhere('slug', 'contact');

        return view('default.front.pages.single', [
                'title' => $page->title ?? $page->name,
                'page' => $page,
            ]);
    }

    public function about()
    {
        $page = Page::firstWhere('slug', 'about');

        return view('default.front.pages.single', [
                'title' => $page->title ?? $page->name,
                'page' => $page,
            ]);
    }
}
