            </div>
        </div>
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
        {{-- Custom Scripts --}}
        @yield('custom_scripts')
        {{-- Footer Scripts --}}
        {{ app_footer_scripts() }}
        {{-- Errors --}}
        @include('notify.error')
        @include('notify.success')
    </body>
</html>
