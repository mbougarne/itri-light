<!DOCTYPE html>
<html
    prefix="og: http://ogp.me/ns#"
    lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Login</title>

	<link rel="stylesheet" href="{{ asset('assets/css/fonts.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/aos.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <style>
        h5 {
            font-size: 1rem;
        }
    </style>
</head>
<body>
    {{-- Main Container --}}
    <section class="ftco-section">
        <!-- Latest posts container -->
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    {{-- The form --}}
                    <form
                        action="{{ route('login') }}"
                        method="POST">
                        {{-- Card --}}
                        <div class="card">
                            <div class="card-header bg-white">
                                <h5>Login</h5>
                            </div>
                            {{-- Body --}}
                            <div class="card-body bg-white">
                                {{-- Username / Email / Password --}}
                                <div class="form-group row">
                                    {{-- Email --}}
                                    <div class="col-md-12">
                                        <label for="username">
                                            <b>
                                                Username <span class="text-danger">*</span>
                                            </b>
                                        </label>
                                        <input
                                            type="text"
                                            name="username"
                                            id="username"
                                            class="form-control @error('username') is-invalid @enderror"
                                            placeholder="Email or Username"
                                            required>
                                        @error('username')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- First and Last Name --}}
                                <div class="form-group row">
                                    {{-- Password --}}
                                    <div class="col-12">
                                        <label for="password">
                                            <b>
                                                Password <span class="text-danger">*</span>
                                            </b>
                                        </label>
                                        <input
                                            type="password"
                                            name="password"
                                            id="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            required
                                            autocomplete="new-password">
                                        @error('password')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- Remember Me --}}
                                <div class="form-group row">
                                    {{-- Password --}}
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input
                                                class="form-check-input"
                                                type="checkbox"
                                                id="remember"
                                                name="remember">
                                            <label class="form-check-label" for="remember">
                                                Remember Me
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Footer --}}
                            <div class="card-footer bg-white">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-12">
                                        <button
                                            type="submit"
                                            class="btn btn-primary float-right">Login</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen">
        <svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00" />
        </svg>
    </div>
    <!-- JavaScript / Scrips -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/aos.js') }}"></script>
    <script src="{{ asset('assets/js/scrollax.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    </body>
</html>

