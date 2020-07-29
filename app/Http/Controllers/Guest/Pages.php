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
        return view('default.front.pages.home', [
            'title' => 'Home',
            'description' => 'Latest posts',
            'posts' => Post::paginate(12),
            'page' => Page::firstWhere('slug', 'home')
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
        return view('default.front.pages.contact', [
                'title' => $page->title ?? $page->name,
                'page' => Page::firstWhere('slug', 'contact'),
            ]);
    }

    public function about()
    {
        return view('default.front.pages.about', [
                'title' => $page->title ?? $page->name,
                'page' => Page::firstWhere('slug', 'about'),
            ]);
    }
}
