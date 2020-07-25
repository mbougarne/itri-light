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
        <a href="{{ route('dashboard') }}">
            {{ env('APP_NAME') }}<span>.</span>
        </a>
        <br>
        {{-- User --}}
        <a href="{{ route('user.update') }}">
            <i class="icon user"></i>
        </a>
        {{-- Profile --}}
        <a href="{{ route('profile.update') }}">
            <i class="icon-profile"></i>
        </a>
        {{-- Settings --}}
        <a href="{{ route('settings.update') }}">
            <i class="icon-cog"></i>
        </a>
    </h1>

    <nav id="colorlib-main-menu" role="navigation">
        <ul>
            <li class="colorlib-active">
                <a href="{{ route('dashboard') }}">Dashboard</a>
            </li>

            <li>
                <a href="{{ route('posts') }}">Posts</a>
            </li>

            <li>
                <a href="{{ route('categories') }}">Categories</a>
            </li>

            <li>
                <a href="{{ route('pages') }}">Pages</a>
            </li>

            <li>
                <a href="{{ route('contacts') }}">Contacts</a>
            </li>
        </ul>
    </nav>
</aside>
