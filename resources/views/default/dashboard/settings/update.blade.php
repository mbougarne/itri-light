@extends('default.dashboard.layouts.app')
{{-- CSS LIBS --}}
@section('custom_css')
<link rel="stylesheet" href="{{ asset('assets/css/upload-preview.css') }}">
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
                <h4>{{ $title }}</h4>
            </div>
        {{-- Create Form --}}
        <form
            action="{{ route('settings.update')}}"
            method="POST"
            enctype="multipart/form-data">
                {{-- Card Body --}}
                <div class="card-body">
                    {{-- Title --}}
                    <div class="form-group row align-items-center">
                       {{-- Title --}}
                        <div class="col-12">
                            <label for="title">Title</label>
                            <input
                                type="text"
                                name="title"
                                class="form-control @error('title') is-invalid @enderror"
                                id="title"
                                value="{{ old('title', $setting->title) }}"
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
                                class="form-control height-auto @error('description') is-invalid @enderror"
                                id="description"
                                required>{{ old('description', $setting->description) }}</textarea>
                            @error('description')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    {{-- Header Scripts --}}
                    <div class="form-group row ">
                        <div class="col-12">
                            <label for="header_scripts">Header Scripts</label>
                            <textarea
                                name="header_scripts"
                                class="form-control height-auto"
                                id="header_scripts">{{ old('header_scripts', $setting->header_scripts) }}</textarea>
                            <p>
                                <small class="text-danger">
                                    Please don't forget to add <code> &lt;script&gt; &lt;/script&gt; </code>
                                </small>
                            </p>
                        </div>
                    </div>
                    {{-- Footer Scripts --}}
                    <div class="form-group row ">
                        <div class="col-12">
                            <label for="footer_scripts">Footer Scripts</label>
                            <textarea
                                name="footer_scripts"
                                class="form-control height-auto"
                                id="footer_scripts">{{ old('footer_scripts', $setting->footer_scripts) }}</textarea>
                            <p>
                                <small class="text-danger">
                                    Please don't forget to add <code> &lt;script&gt; &lt;/script&gt; </code>
                                </small>
                            </p>
                        </div>
                    </div>
                    {{-- Admin Email --}}
                    <div class="form-group row align-items-center">
                         <div class="col-12">
                             <label for="admin_email">Admin Email</label>
                             <input
                                 type="text"
                                 name="admin_email"
                                 class="form-control @error('admin_email') is-invalid @enderror"
                                 id="admin_email"
                                 value="{{ old('admin_email', $setting->admin_email) }}">
                             @error('admin_email')
                                 <span class="invalid-feedback">
                                     {{ $message }}
                                 </span>
                             @enderror
                            <p>
                                <small class="text-muted">
                                    The email to receive the contact form messages
                                </small>
                            </p>
                         </div>
                     </div>
                    {{-- Language --}}
                    <div class="form-group row align-items-center">
                        <div class="col-12">
                            <label for="language">Language</label>
                            <select
                                name="language"
                                id="language"
                                class="form-control">
                                <option value="en" selected>English</option>
                            </select>
                            <p>
                                <small class="text-muted">
                                    In the meantime, we only support English.
                                </small>
                            </p>
                        </div>
                    </div>
                    {{-- Logo --}}
                    <div class="form-group row align-items-center">
                        <div class="col-sm-12 col-md-6">
                            <label>Logo</label>
                            <div
                                id="image-preview"
                                class="image-preview">
                                <label for="logo" id="image-label">Choose File</label>
                                <input type="file" name="logo" id="logo" >
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label>Current Logo</label>
                            <img
                                src="{{ asset($setting->logo) }}"
                                class="img-fluid">
                        </div>
                    </div>
                    {{-- Favicon --}}
                    <div class="form-group row align-items-center">
                        <div class="col-sm-12 col-md-6">
                            <label>Favicon</label>
                            <div
                                id="favicon-preview"
                                class="image-preview">
                                <label for="favicon" id="favicon-label">Choose File</label>
                                <input type="file" name="favicon" id="favicon" >
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label>Current Favicon</label>
                            <img
                                src="{{ asset($setting->favicon) }}"
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
<script>
    $.uploadPreview({
        input_field: "#logo",
        preview_box: "#image-preview",
        label_field: "#image-label",
        label_default: "Choose File",
        label_selected: "Change File",
        no_label: false,
        success_callback: null
    });

    $.uploadPreview({
        input_field: "#favicon",
        preview_box: "#favicon-preview",
        label_field: "#favicon-label",
        label_default: "Choose File",
        label_selected: "Change File",
        no_label: false,
        success_callback: null
    });
</script>
@endsection
