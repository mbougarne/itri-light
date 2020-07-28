@extends('default.dashboard.layouts.app')

@section('content')

<!-- Posts -->
<div class="row">
    <div class="col-sm-12 col-md-8">
        <h3 class="mb-4">Pages</h3>
        <p>
            <small>Manage your pages</small>
        </p>
    </div>
    <div class="col-sm-12 col-md-4">
        <a
            href="{{ route('pages.create') }}"
            class="btn btn-round btn-primary shadow-sm">
            Create New One <i class="icon-plus"></i>
        </a>
    </div>
</div>

@forelse ($pages as $page)
    <div class="row">
        <!-- Post container -->
        <div class="col-12">
            <article class="mb-2 ftco-animate">
                <div class="row">
                    <!-- Thumbnail -->
                    <div class="col-md-3 col-sm-4">
                        <a href="{{ route('pages.update', $page->id) }}">
                            <img
                                src="{{ asset($page->thumbnail) }}"
                                alt="{{ $page->name }}"
                                class="img-fluid">
                        </a>
                    </div>
                    <!-- Post preview -->
                    <div class="col-md-9 col-sm-8">
                        <div class="text text-2">
                            <!-- Post Title -->
                            <h5 class="mb-4">
                                <a href="{{ route('posts.update', $page->id) }}">
                                    {{ $page->name }}
                                </a>
                                <small class="text-muted">
                                    {{ $page->created_at->toDayDateTimeString() }}
                                </small>
                            </h5>
                            <!-- Update post -->
                            <p>
                                <a href="{{ route('pages.update', $page->id) }}"
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
                There is no page yet,
            </p>
        </div>
    </div>
@endforelse

{{-- Links --}}
<div class="pagination">
    {{ $pages->links() }}
</div>

@endsection
