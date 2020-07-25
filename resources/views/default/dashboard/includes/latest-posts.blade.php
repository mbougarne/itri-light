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
        <div class="col-12">
            <article class="blog-entry ftco-animate">
                <!-- Thumbnail -->
                <div class="col-md-4 col-sm-6">
                    <a
                        href="{{ route('posts.update', $post->id) }}"
                        class="img img-2"
                        style="background-image: url({{ asset($post->thumbnail) }});"></a>
                </div>
                <!-- Post preview -->
                <div class="col-md-8 col-sm-6">
                    <div class="text text-2 pt-2 mt-3">
                        <!-- Post Category -->
                        <span class="category mb-3 d-block">
                            @foreach ($post->categories as $category)
                                <a href="{{ route('categories.update', $category->id) }}">
                                    {{ $category->name }}
                                </a>
                            @endforeach
                        </span>
                        <!-- Post Title -->
                        <h3 class="mb-4">
                            <a href="{{ route('posts.update', $post->id) }}">
                                {{ $post->title }}
                            </a>
                        </h3>
                        <!-- Post Excerpt / description -->
                        <p class="mb-4">
                            {{ $post->description }}
                        </p>
                        <!-- Created By and On -->
                        <div class="author mb-4 d-flex align-items-center">
                            <a href="#" class="img" style="background-image: url(images/person_2.jpg);"></a>
                            <div class="ml-3 info">
                                <h3>
                                    <!-- Created date -->
                                    <span class="d-block">
                                        <small>On </small>
                                        <span>{{ $post->created_at->toDayDateTimeString() }}</span>
                                    </span>
                                </h3>
                            </div>
                        </div>
                        <!-- Continue reading -->
                        <div class="meta-wrap align-items-center">
                            <div class="half">
                                <p>
                                    <a href="#" class="btn py-2 float-right">
                                        UPDATE
                                        <i class="icon-pencil"></i>
                                    </a>
                                </p>
                            </div>
                        </div>
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
                <a
                    href="{{ route('posts.create') }}"
                    class="btn btn-link">
                    Create New One <i class="icon-plus"></i>
                </a>
            </p>
        </div>
    </div>
@endforelse
