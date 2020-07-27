@extends('default.dashboard.layouts.app')

@section('content')

<!-- Posts -->
<div class="row">
    <div class="col-sm-12 col-md-8">
        <h3 class="mb-4">Categories</h3>
        <p>
            <small>Manage your categories</small>
        </p>
    </div>
    <div class="col-sm-12 col-md-4">
        <a
            href="{{ route('categories.create') }}"
            class="btn btn-round btn-primary shadow-sm">
            Create New One <i class="icon-plus"></i>
        </a>
    </div>
</div>

<div class="row">
    @forelse ($categories as $category)
        <!-- Post container -->
        <div class="col-sm-6 col-md-4">
            <div class="text text-2">
                <!-- Post Title -->
                <h5>
                    <a href="{{ route('categories.update', $category->id) }}">
                        {{ $category->name }}
                    </a>
                </h5>
                <!-- Update post -->
                <p>
                    <a
                        href="{{ route('categories.update', $category->id) }}"
                        class="btn btn-round btn-primary py-2">
                        UPDATE <i class="icon-pencil"></i>
                    </a>
                </p>
            </div>
        </div>
    @empty
        <div class="col-12">
            <p class="lead">
                There is no category yet,
            </p>
        </div>
    @endforelse
</div>

@endsection
