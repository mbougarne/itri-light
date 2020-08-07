@section('single-post')
<div
    class="hero-wrap js-fullheight about-page"
    style="background-image: url({{ asset($page->thumbnail) }});"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="js-fullheight d-flex justify-content-center align-items-center">
        <div class="col-md-8 text text-center">
            <div
                class="img mb-4"
                style="background-image: url({{ asset(admin_profile()->avatar) }});"></div>
            <div class="desc">
                <h2 class="subheading">{{ $page->title }}</h2>
                <h1 class="mb-4">{{ admin_profile()->fullName() }}</h1>
                <p class="mb-4">
                    {!! $page->body !!}
                </p>
                <ul class="ftco-social mt-3">
                    <li class="ftco-animate fadeInUp ftco-animated">
                        <a href="{{ admin_profile()->twitter }}">
                            <i class="icon-twitter"></i>
                        </a>
                    </li>
                    <li class="ftco-animate fadeInUp ftco-animated">
                        <a href="{{ admin_profile()->github }}">
                            <i class="icon-github"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
