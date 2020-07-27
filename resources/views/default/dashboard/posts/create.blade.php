@extends('default.dashboard.layouts.app')
{{-- CSS LIBS --}}
@section('custom_css')
<link rel="stylesheet" href="{{ asset('assets/css/upload-preview.css') }}">
<link rel="stylesheet" href="{{ asset('assets/summernote/summernote-bs4.css') }}">
@endsection
{{-- Content --}}
@section('content')
{{-- Create New Service --}}
<div class="row">
    <div class="col-12">
        {{-- Create Form --}}
        <form
            action="{{ route('posts.create')}}"
            method="POST"
            enctype="multipart/form-data">
            {{-- Card --}}
            <div class="card" id="settings-card">
                {{-- Card Header --}}
                <div class="card-header bg-white">
                    <h4>Create New Post</h4>
                </div>
                {{-- Card Body --}}
                <div class="card-body">
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
                                value="{{ old('title') }}"
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
                                id="description">{{ old('description') }}</textarea>
                        </div>
                    </div>
                    {{-- Categories --}}
                    <div class="form-group row">
                        <div class="col-12">
                            <label>Select Categories</label>
                        </div>
                        <div class="col-12">
                            @forelse ($categories as $category)
                                <label for="{{ $category->name }}">
                                    <input
                                        type="checkbox"
                                        name="categories[]"
                                        id="category"
                                        value="{{ $category->id }}"> {{ $category->name }}
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
                                required>{{ old('body') }}</textarea>
                            @error('body')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    {{-- thumbnail --}}
                    <div class="form-group row align-items-center">
                        <div class="row">
                            <div class="form-group col-12">
                                <label>thumbnail</label>
                                <div class="col-sm-12 col-md-7">
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
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Card footer --}}
                <div class="card-footer bg-white">
                    <div class="form-group">
                        @csrf
                        <button class="btn btn-lg btn-primary shadow-sm float-right">
                            Create <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
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
