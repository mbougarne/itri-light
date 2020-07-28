@extends('default.dashboard.layouts.app')
{{-- CSS LIBS --}}
@section('custom_css')
<link rel="stylesheet" href="{{ asset('assets/css/upload-preview.css') }}">
<link rel="stylesheet" href="{{ asset('assets/summernote/summernote-bs4.css') }}">
@endsection
{{-- Content --}}
@section('content')
<div class="row">
    <div class="col-12">
        {{-- Create Form --}}
        {{-- Card --}}
        <div class="card" id="settings-card">
            {{-- Card Header --}}
            <div class="card-header bg-white">
                <div class="row">
                    <div class="col-md-8">
                        <h4>{{ $title }}</h4>
                    </div>
                    <div class="col-md-4">
                        <form
                            action="{{ route('posts.delete', $post->id) }}"
                            method="POST"
                            class="form-inline float-right">
                            @csrf
                            <button class="btn btn-danger">
                                DELETE <i class="icon-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <form
                action="{{ route('posts.update', $post->id)}}"
                method="POST"
                enctype="multipart/form-data">
                    {{-- Card Body --}}
                    <div class="card-body">
                        {{-- Is Published --}}
                        <div class="form-group row align-items-center">
                        {{-- Is Published --}}
                            <div class="col-12">
                                <label for="is_published">Is Published</label>
                                <select
                                    name="is_published"
                                    id="is_published"
                                    class="form-control">
                                    <option
                                        value="1"
                                        {{ ($post->is_published) ? 'selected' : '' }}>Published</option>
                                    <option
                                        value="0"
                                        {{ (!$post->is_published) ? 'selected' : '' }}>Draft</option>
                                </select>
                            </div>
                        </div>
                        {{-- Title --}}
                        <div class="form-group row align-items-center">
                        {{-- title --}}
                            <div class="col-12">
                                <label for="title">Title</label>
                                <input
                                    type="text"
                                    name="title"
                                    class="form-control @error('title') is-invalid @enderror"
                                    id="title"
                                    value="{{ old('title', $post->title) }}"
                                    required>
                                @error('title')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- Description --}}
                        <div class="form-group row ">
                            <div class="col-12">
                                <label for="description">Description</label>
                                <textarea
                                    name="description"
                                    class="form-control height-auto"
                                    id="description">{{ old('description', $post->description) }}</textarea>
                            </div>
                        </div>
                        {{-- Categories --}}
                        <div class="form-group row">
                            <div class="col-12">
                                <label>Select Categories</label>
                            </div>
                            <div class="col-12">
                                @forelse ($categories as $category)
                                    <label
                                        for="{{ $category->name }}"
                                        class="mr-2">
                                        <input
                                            type="checkbox"
                                            name="categories[]"
                                            id="category"
                                            value="{{ $category->id }}"
                                            {{ (in_array($category->id, $categories_ids)) ? 'checked' : ''}}>
                                            {{ $category->name }}
                                    </label>
                                @empty
                                    <a href="{{ route('categories.create') }}" class="btn btn-link">
                                        Create new one <i class="icon-pencil"></i>
                                    </a>
                                @endforelse
                            </div>
                        </div>
                        {{-- Body --}}
                        <div class="form-group row align-items-center">
                            <div class="col-12">
                            <label for="body">Body</label>
                                <textarea
                                    name="body"
                                    id="body"
                                    class="@error('body') is-invalid @enderror"
                                    required>{{ old('body', $post->body) }}</textarea>
                                @error('body')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- thumbnail --}}
                        <div class="form-group row align-items-center">
                            <div class="col-sm-12 col-md-6">
                                <label>Thumbnail</label>
                                <div
                                    id="image-preview"
                                    class="image-preview @error('thumbnail') is-invalid @enderror">
                                    <label for="thumbnail" id="image-label">Choose File</label>
                                    <input type="file" name="thumbnail" id="thumbnail" >
                                </div>
                                @error('thumbnail')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label>Current Thumbnail</label>
                                <img
                                    src="{{ asset($post->thumbnail) }}"
                                    alt="{{ $post->title }}"
                                    class="img-fluid">
                            </div>
                        </div>
                    </div>
                    {{-- Card footer --}}
                    <div class="card-footer bg-white">
                        <div class="form-group">
                            @csrf
                            <button class="btn btn-primary shadow-sm float-right">
                                Update <i class="icon-pencil"></i>
                            </button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>
@endsection
{{-- Page Scripts --}}
@section('custom_scripts')
<script src="{{ asset('assets/js/upload-preview.min.js') }}"></script>
<script src="{{ asset('assets/summernote/summernote-bs4.js') }}"></script>
<script>
    $.uploadPreview({
        input_field: "#thumbnail",
        preview_box: "#image-preview",
        label_field: "#image-label",
        label_default: "Choose File",
        label_selected: "Change File",
        no_label: false,
        success_callback: null
    });
</script>
<script>
    $(document).ready( function($) {

        function sendFile(file) {

            let form_data = new FormData();
                form_data.append('upload_image', file);
                form_data.append('_token', "{{ csrf_token() }}");
                form_data.append('location', "thumbnails");

            $.ajax({
                data: form_data,
                type: "POST",
                url: "{{ route('editor.upload.image') }}",
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    $('#body').summernote('editor.insertImage', response.path);
                }
            });
        }

        $("#body").summernote({
            dialogsInBody: true,
            height: 300,
            minHeight: null,
            maxHeight: null,
            toolbar: [
                ['style', ['style']],
                ['style', ['bold', 'italic', 'underline', 'strikethrough']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video', 'hr']],
                ['genixcms', ['elfinder']],
                ['view', ['codeview']]
            ],
            callbacks:{
                onImageUpload: function(files, editor, welEditable) {
                    sendFile(files[0])
                }
            }
        });

    })
</script>
@endsection
