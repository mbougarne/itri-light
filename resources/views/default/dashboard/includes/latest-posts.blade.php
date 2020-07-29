<!-- Posts -->
<div class="row">
    <div class="col-12">
        <h3 class="mb-4">Latest Posts</h3>
        <p>
            <small>Manage your posts</small>
        </p>
    </div>
</div>

@forelse ($posts->chunk(3) as $chunks)
    <div class="row">
        @foreach ($chunks as $post)
            <!-- Post container -->
            <div class="col-md-4">
                <article class="blog-entry ftco-animate">
                    <!-- Thumbnail -->
                    <a href="{{ route('posts.update', $post->id) }}">
                        <img src="{{ asset($post->thumbnail) }}" class="img-fluid">
                    </a>
                    <!-- Post preview -->
                    <div class="text text-2 pt-2 mt-3">
                        <!-- Post Title -->
                        <p class="mb-3">
                            <a href="{{ route('posts.update', $post->id) }}" class="text-dark">
                                {{ $post->title }}
                            </a>
                            <!-- Update -->
                            <small>
                                <a
                                    href="{{ route('posts.update', $post->id) }}"
                                    class="btn btn-sm btn-link text-danger float-right">
                                    UPDATE <i class="icon-pencil"></i>
                                </a>
                            </small>
                        </p>
                    </div>
                </article>
            </div>
            <!-- End of post container -->
        @endforeach
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
