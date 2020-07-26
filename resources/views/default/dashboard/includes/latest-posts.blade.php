<!-- Posts -->
<div class="row">
    <div class="col-12">
        <h3 class="mb-4">Latest Posts</h3>
        <p>
            <small>Manage your posts</small>
        </p>
    </div>
</div>

@forelse ($posts as $post)
    <div class="row">
        <!-- Post container -->
        <div class="col-md-4">
            <article class="blog-entry ftco-animate">
                <!-- Post Title -->
                <h5>
                    <a href="{{ route('posts.update', $post->id) }}" class="text-dark">
                        {{ $post->title }}
                    </a>
                </h5>
                <!-- Thumbnail -->
                <a
                    href="{{ route('posts.update', $post->id) }}"
                    class="img img-2"
                    style="background-image: url({{ asset($post->thumbnail) }});"></a>
                <!-- Post preview -->
                <div class="text text-2 pt-2 mt-3">
                    <!-- Post Category -->
                    <span class="category mb-3 d-block">
                        @foreach ($post->categories as $category)
                            <a href="{{ route('categories.update', $category->id) }}">
                                {{ $category->name }}
                            </a>
                        @endforeach
                    </span>
                    <!-- Continue reading -->
                    <a
                        href="{{ route('posts.update', $post->id) }}"
                        class="btn btn-block btn-round btn-primary">
                        UPDATE
                        <i class="icon-pencil"></i>
                    </a>
                </div>
            </article>
        </div>
        <!-- End of post container -->
    </div>
@empty
    <div class="row">
        <div class="col-12">
            <p class="lead">
                There is no post yet,
                <a
                    href="{{ route('posts.create') }}"
                    class="btn btn-link">
                    Create New One <i class="icon-plus"></i>
                </a>
            </p>
        </div>
    </div>
@endforelse
