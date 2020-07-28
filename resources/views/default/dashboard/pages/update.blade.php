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
                            action="{{ route('pages.delete', $page->id) }}"
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
        {{-- Create Form --}}
        <form
            action="{{ route('pages.update', $page->id)}}"
            method="POST"
            enctype="multipart/form-data">
                {{-- Card Body --}}
                <div class="card-body">
                    {{-- Is Published --}}
                    <div class="form-group row align-items-center">
                        <div class="col-12">
                            <label for="is_published">Is Published</label>
                            <select
                                name="is_published"
                                id="is_published"
                                class="form-control">
                                <option
                                    value="1"
                                    {{ ($page->is_published) ? 'selected' : '' }}>Published</option>
                                <option
                                    value="0"
                                    {{ (!$page->is_published) ? 'selected' : '' }}>Draft</option>
                            </select>
                        </div>
                    </div>
                    {{-- Title --}}
                    <div class="form-group row align-items-center">
                       {{-- Name --}}
                        <div class="col-12">
                            <label for="name">Name</label>
                            <input
                                type="text"
                                name="name"
                                class="form-control @error('name') is-invalid @enderror"
                                id="name"
                                value="{{ old('name', $page->name) }}"
                                required>
                            @error('name')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                       {{-- title --}}
                        <div class="col-12">
                            <label for="title">Title</label>
                            <input
                                type="text"
                                name="title"
                                class="form-control"
                                id="title"
                                value="{{ old('title', $page->title) }}">
                        </div>
                    </div>
                    {{-- Description --}}
                    <div class="form-group row ">
                        <div class="col-12">
                            <label for="description">Description</label>
                            <textarea
                                name="description"
                                class="form-control height-auto"
                                id="description">{{ old('description', $page->description) }}</textarea>
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
                                required>{{ old('body', $page->body) }}</textarea>
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
                                src="{{ asset($page->thumbnail) }}"
                                alt="{{ $page->name }}"
                                class="img-fluid">
                        </div>
                    </div>
                </div>
                {{-- Card footer --}}
                <div class="card-footer bg-white">
                    <div class="form-group">
                        @csrf
                        <button class="btn btn-primary shadow-sm float-right">
                            Update <i class="fas fa-plus"></i>
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
