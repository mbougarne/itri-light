@extends('default.front.layouts.app')
{{-- Article Open Graph --}}
@section('article_ogp')
<meta property="og:article:author" content="{{ admin_profile()->fullName()  }}" />
<meta property="og:article:published_time " content="{{ $post->created_at  }}" />
@endsection
{{-- Cover --}}
@section('single-post')
<div
    class="hero-wrap js-fullheight"
    style="background-image: url({{ asset($post->thumbnail) }});"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="js-fullheight d-flex justify-content-center align-items-center">
        <div class="col-md-8 text text-center">
            <div class="desc">
                <h1 class="mb-4">{{ $post->title }}</h1>
                <p class="screen-text"> {{ $post->description }} </p>
            </div>
        </div>
    </div>
</div>
@endsection
{{-- Content --}}
@section('content')
<div class="row">
    <div class="col-lg-12">
        <article>
            {!! $post->body !!}
        </article>
    </div>
</div>
{{-- Related Posts --}}
<div class="row">
    @foreach ($related as $related_post)
    <!-- Post container -->
    <div class="col-md-4 col-sm-12">
        <article class="blog-entry ftco-animate">
            <!-- Thumbnail -->
            <a
                href="{{ route('posts.post', $related_post->slug) }}"
                class="img img-2"
                style="background-image: url({{asset($related_post->thumbnail)}});"></a>
            <!-- Post preview -->
            <div class="text text-2 pt-2 mt-3">
                <!-- Post Title -->
                <h3 class="mb-4">
                    <a href="{{ route('posts.post', $related_post->slug) }}">
                        {{ $related_post->title }}
                    </a>
                </h3>
            </div>
        </article>
    </div>
    <!-- End of post container -->
    @endforeach
</div>
@endsection
