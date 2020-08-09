<!-- Side navigation -->
<a
    href="#"
    class="js-colorlib-nav-toggle colorlib-nav-toggle">
    <i></i>
</a>

<aside
    id="colorlib-aside"
    role="complementary"
    class="js-fullheight text-center">

    <h1 id="colorlib-logo">
        <a href="{{ route('pages.home') }}">
            {{ env('APP_NAME') }}<span>.</span>
        </a>
    </h1>

    <nav id="colorlib-main-menu" role="navigation">
        <ul>
            <li {!! active_route('pages.home') !!}>
                <a href="{{ route('pages.home') }}">Home</a>
            </li>

            <li {!! active_route('pages.about') !!}>
                <a href="{{ route('pages.about') }}">About</a>
            </li>

            <li {!! active_route('pages.contact') !!}>
                <a href="{{ route('pages.contact') }}">Contact</a>
            </li>

            <li {!! active_route('posts.blog') !!}>
               <a href="{{ route('posts.blog') }}">Blog</a>
            </li>
        </ul>
    </nav>
    <!-- Social Media -->
    <div class="colorlib-footer">
        <ul>
            @if (admin_profile()->facebook)
                <li>
                    <a href="{{ admin_profile()->facebook }}">
                        <i class="icon-facebook"></i>
                    </a>
                </li>
            @endif

            @if (admin_profile()->twitter)
                <li>
                    <a href="{{ admin_profile()->twitter }}">
                        <i class="icon-twitter"></i>
                    </a>
                </li>
            @endif

            @if (admin_profile()->github)
                <li>
                    <a href="{{ admin_profile()->github }}">
                        <i class="icon-github"></i>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</aside>
