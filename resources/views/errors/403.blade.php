<!DOCTYPE html>
<html lang="{{ app_language() }}">
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{ env('APP_NAME') }} &mdash; 403</title>

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
                <div class="col-md-6 mx-auto">
                    <h1 class="mb-4">
                        Ooops!!! 403 &mdash; Forbidden
                    </h1>
                    <p class="lead">
                        You don't have permissions to access this resource!
                    </p>
                    <p>
                        <a href="{{ route('pages.home') }}" class="btn btn-primary">
                            Back To Home <i class="icon-home"></i>
                        </a>
                    </p>
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
    <script src="{{ asset('assets/izitoast/js/iziToast.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/aos.js') }}"></script>
    <script src="{{ asset('assets/js/scrollax.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    {{-- Errors --}}
    @include('notify.error')
    @include('notify.success')
</body>
</html>

