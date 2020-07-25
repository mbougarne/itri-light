<!DOCTYPE html>
<html
    prefix="og: http://ogp.me/ns#"
    lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Install the application</title>

    <link rel="stylesheet" href="{{ asset('assets/izitoast/css/iziToast.min.css') }}">
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
                <div class="col-12">
                    {{-- The form --}}
                    <form
                        action="{{ route('install') }}"
                        method="POST"
                        enctype="multipart/form-data">
                        {{-- Card --}}
                        <div class="card">
                            <div class="card-header bg-white">
                                <h5>Use the form below to install the app</h5>
                            </div>
                            {{-- Body --}}
                            <div class="card-body bg-white">
                                {{-- User details --}}
                                <div class="form-group row">
                                    <div class="col-12">
                                        <h5 class="text-muted">
                                            User details
                                        </h5>
                                    </div>
                                </div>
                                {{-- Username / Email / Password --}}
                                <div class="form-group row">
                                    {{-- Email --}}
                                    <div class="col-md-4">
                                        <label for="email">
                                            <b>
                                                Email <span class="text-danger">*</span>
                                            </b>
                                        </label>
                                        <input
                                            type="email"
                                            name="email"
                                            id="name"
                                            class="form-control @error('email') is-invalid @enderror"
                                            required>
                                        @error('username')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    {{-- Username --}}
                                    <div class="col-md-4">
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
                                            required>
                                            <small class="text-danger">
                                                At least 8 charachters
                                            </small>
                                        @error('username')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    {{-- Password --}}
                                    <div class="col-md-4">
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
                                {{-- First and Last Name --}}
                                <div class="form-group row">
                                    {{-- First Name --}}
                                    <div class="col-md-4">
                                        <label for="first_name">
                                            <b>
                                                First Name <span class="text-danger">*</span>
                                            </b>
                                        </label>
                                        <input
                                            type="text"
                                            name="first_name"
                                            id="first_name"
                                            class="form-control @error('first_name') is-invalid @enderror"
                                            required>
                                        @error('first_name')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    {{-- Last Name --}}
                                    <div class="col-md-4">
                                        <label for="last_name">
                                            <b>
                                                Last Name <span class="text-danger">*</span>
                                            </b>
                                        </label>
                                        <input
                                            type="text"
                                            name="last_name"
                                            id="last_name"
                                            class="form-control @error('last_name') is-invalid @enderror"
                                            required>
                                        @error('last_name')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    {{-- Admin Email --}}
                                    <div class="col-md-4">
                                        <label for="admin_email">
                                            <b>
                                                Admin Email <span class="text-danger">*</span>
                                            </b>
                                        </label>
                                        <input
                                            type="text"
                                            name="admin_email"
                                            id="admin_email"
                                            class="form-control @error('admin_email') is-invalid @enderror"
                                            required>
                                            <small class="text-info">Where you will receive emails</small>
                                        @error('admin_email')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- First and Last Name --}}
                                <div class="form-group row">
                                    {{-- Title --}}
                                    <div class="col-md-4">
                                        <label for="title">
                                            <b>
                                                App Title <span class="text-danger">*</span>
                                            </b>
                                        </label>
                                        <input
                                            type="text"
                                            name="title"
                                            id="title"
                                            class="form-control @error('title') is-invalid @enderror"
                                            required>
                                        @error('title')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    {{-- Description --}}
                                    <div class="col-md-4">
                                        <label for="description">
                                            <b>
                                                App Description <span class="text-danger">*</span>
                                            </b>
                                        </label>
                                        <input
                                            type="text"
                                            name="description"
                                            id="description"
                                            class="form-control @error('description') is-invalid @enderror"
                                            required>
                                        @error('description')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    {{-- Logo --}}
                                    <div class="col-md-4">
                                        <label for="admin_email">
                                            <b>
                                                Logo or Avatar <span class="text-danger">*</span>
                                            </b>
                                        </label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text" id="logoInput">Upload</span>
                                            </div>
                                            <div class="custom-file">
                                                <input
                                                    type="file"
                                                    class="custom-file-input @error('logo') is-invalid @enderror"
                                                    id="logo"
                                                    name="logo"
                                                    aria-describedby="logoInput">
                                                <label class="custom-file-label" for="logo">Choose file</label>
                                            </div>
                                          </div>
                                        @error('logo')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
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
                                            class="btn btn-success float-right">Install</button>
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
    <script src="{{ asset('assets/izitoast/js/iziToast.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/aos.js') }}"></script>
    <script src="{{ asset('assets/js/scrollax.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    @if (session()->has('success'))
        <script>
            iziToast.show({
                title: "Install",
                message: "{{ session()->get('success') }}",
                theme: 'light',
                color: 'green',
                icon: 'icon-cross',
                position: 'topCenter', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter, center
            });
        </script>
    @endif
    </body>
</html>

