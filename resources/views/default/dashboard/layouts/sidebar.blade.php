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
    <!-- Social Media -->
    <div class="colorlib-footer">
        <!-- Footer -->
        <footer>
            <div class="colorlib-footer text-center">
                <p>
                    <small>
                        Copyright &copy; {{ now()->year }} All rights reserved
                        |
                        This template is made with
                        <i class="icon-heart" aria-hidden="true"></i>
                        by
                        <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    </small>
                </p>
            </div>
        </footer>
    </div>
</aside>
