@include('default.front.layouts.header')
{{-- Single Post --}}
@yield('single-post')
<!-- Main Content -->
<section class="ftco-section">
    <!-- Latest posts container -->
    <div class="container">
        @yield('content')
    </div>
</section>
@include('default.front.layouts.footer')
