@extends('default.front.layouts.app')

@section('content')

    @forelse ($posts->chunk(2) as $chunks)
        <!-- Posts -->
        <div class="row">
        @foreach ($chunks as $post)
            <!-- Post container -->
            <div class="col-md-6 col-sm-12">
                <article class="blog-entry ftco-animate">
                    <!-- Thumbnail -->
                    <a
                        href="{{ route('posts.post', $post->slug) }}"
                        class="img img-2"
                        style="background-image: url({{asset($post->thumbnail)}});"></a>
                    <!-- Post preview -->
                    <div class="text text-2 pt-2 mt-3">
                        @foreach ($post->categories as $category)
                            <!-- Post Category -->
                            <span class="category mb-3 d-block">
                                <a href="{{ route('categories.posts', $category->id) }}">
                                    {{$category->name}}
                                </a>
                            </span>
                        @endforeach

                        <!-- Post Title -->
                        <h3 class="mb-4">
                            <a href="{{ route('posts.post', $post->slug) }}">
                                {{ $post->title }}
                            </a>
                        </h3>
                        <!-- Post Excerpt / description -->
                        <p class="mb-4">
                            {{  $post->description ??  strip_tags(substr( $post->body, 0, 115)) }}
                        </p>
                        <!-- Created By and On -->
                        <div class="author mb-4 d-flex align-items-center">
                            <a
                                href="#"
                                class="img"
                                style="background-image: url({{ admin_profile()->avatar }});"></a>
                            <div class="ml-3 info">
                                <h3>
                                    <!-- Author -->
                                    <span class="d-block">
                                        <small>By</small>
                                        <span>
                                            {{ admin_profile()->first_name . ' ' . admin_profile()->last_name }}
                                        </span>
                                    </span>
                                    <!-- Created date -->
                                    <span class="d-block">
                                        <small>On </small>
                                        <span>
                                            {{ $post->created_at->toFormattedDateString() }}
                                        </span>
                                    </span>
                                </h3>
                            </div>
                        </div>
                        <!-- Continue reading -->
                        <div class="meta-wrap align-items-center">
                            <div class="half">
                                <p>
                                    <a
                                        href="{{ route('posts.post', $post->slug) }}"
                                        class="btn py-2 float-right">
                                        Continue Reading
                                        <span class="ion-ios-arrow-forward"></span>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
            <!-- End of post container -->
        @endforeach
        </div>
        <!-- End posts -->

    @empty
        <div class="row col-12">
            <h1>Ooops!!! We don't have any article yet!</h1>
        </div>
    @endforelse

@endsection
