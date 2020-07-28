@extends('default.dashboard.layouts.app')

@section('content')

<!-- Posts -->
<div class="row">
    <div class="col-sm-12 col-md-8">
        <h3 class="mb-4">Posts</h3>
        <p>
            <small>Manage your posts</small>
        </p>
    </div>
    <div class="col-sm-12 col-md-4">
        <a
            href="{{ route('posts.create') }}"
            class="btn btn-round btn-primary shadow-sm">
            Create New One <i class="icon-plus"></i>
        </a>
    </div>
</div>

@forelse ($posts as $post)
    <div class="row">
        <!-- Post container -->
        <div class="col-12">
            <article class="mb-2 ftco-animate">
                <div class="row">
                    <!-- Thumbnail -->
                    <div class="col-md-3 col-sm-4">
                        <a href="{{ route('posts.update', $post->id) }}">
                            <img
                                src="{{ asset($post->thumbnail) }}"
                                alt="{{ $post->title }}"
                                class="img-fluid">
                        </a>
                    </div>
                    <!-- Post preview -->
                    <div class="col-md-9 col-sm-8">
                        <div class="text text-2">
                            <!-- Post Title -->
                            <h5 class="mb-4">
                                <a href="{{ route('posts.update', $post->id) }}">
                                    {{ $post->title }}
                                </a>
                                <small class="text-muted">
                                    {{ $post->created_at->toDayDateTimeString() }}
                                </small>
                            </h5>
                            <!-- Update post -->
                            <p>
                                <a href="{{ route('posts.update', $post->id) }}"
                                    class="btn py-2 btn-primary">
                                    UPDATE <i class="icon-pencil"></i>
                                </a>
                            </p>
                    </div>
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
            </p>
        </div>
    </div>
@endforelse

{{-- Links --}}
<div class="pagination">
    {{ $posts->links() }}
</div>

@endsection
