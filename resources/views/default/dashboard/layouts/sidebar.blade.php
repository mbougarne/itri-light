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
        <small>
            <a href="{{ route('user.update') }}" class="text-sm">
                <i class="icon-user"></i>
            </a>
        </small>
        {{-- Profile --}}
        <small>
            <a href="{{ route('profile.update') }}" class="text-sm">
                <i class="icon-file-text"></i>
            </a>
        </small>
        {{-- Settings --}}
        <small>
            <a href="{{ route('settings.update') }}" class="text-sm">
                <i class="icon-cog"></i>
            </a>
        </small>
    </h1>

    <nav id="colorlib-main-menu" role="navigation">
        <ul>
            <li {!! active_route('dashboard') !!}>
                <a href="{{ route('dashboard') }}">Dashboard</a>
            </li>

            <li {!! active_route('posts') !!}>
                <a href="{{ route('posts') }}">Posts</a>
            </li>

            <li {!! active_route('categories') !!}>
                <a href="{{ route('categories') }}">Categories</a>
            </li>

            <li {!! active_route('pages') !!}>
                <a href="{{ route('pages') }}">Pages</a>
            </li>

            <li {!! active_route('contacts') !!}>
                <a href="{{ route('contacts') }}">Contacts</a>
            </li>
        </ul>
    </nav>
    <!-- Footer -->
    <div class="mt-3 pt-2">
        {{-- Logout --}}
        <form
            action="{{ route('logout') }}"
            method="POST"
            class="d-inline">
            @csrf
            <button class="btn btn-sm ">
                Logout <i class="icon-arrow-right text-danger"></i>
            </button>
        </form>
    </div>
</aside>
