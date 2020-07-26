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
            <li class="colorlib-active">
                <a href="{{ route('dashboard') }}">Home</a>
            </li>

            <li>
                <a href="/about">About</a>
            </li>

            <li>
                <a href="/contact">Contact</a>
            </li>
        </ul>
    </nav>
    <!-- Social Media -->
    <div class="colorlib-footer">
        <ul>
            <li>
                <a href="{{ auth()->user()->profile->facebook }}">
                    <i class="icon-facebook"></i>
                </a>
            </li>
            <li>
                <a href="{{ auth()->user()->profile->twitter }}">
                    <i class="icon-twitter"></i>
                </a>
            </li>
            <li>
                <a href="{{ auth()->user()->profile->github }}">
                    <i class="icon-github"></i>
                </a>
            </li>
        </ul>
    </div>
</aside>
