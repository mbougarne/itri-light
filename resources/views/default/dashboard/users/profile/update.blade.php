@extends('default.dashboard.layouts.app')
{{-- Content --}}
@section('content')
{{-- Create New Service --}}
<div class="row">
    <div class="col-12">
        {{-- Create Form --}}
        <form
            action="{{ route('profile.update') }}"
            method="POST"
            enctype="multipart/form-data">
            {{-- Card --}}
            <div class="card">
                <div class="card-header bg-white">
                    <h4>{{ $title }}</h4>
                </div>
                {{-- Body --}}
                <div class="card-body bg-white">
                    {{-- First and Last Name --}}
                    <div class="form-group row">
                        {{-- First Name --}}
                        <div class="col-md-6">
                            <label for="first_name">
                                <b> First Name <span class="text-danger">*</span> </b>
                            </label>
                            <input
                                type="text"
                                name="first_name"
                                id="first_name"
                                class="form-control @error('first_name', $profile->first_name) is-invalid @enderror"
                                value="{{ old('first_name', $profile->first_name) }}"
                                required>
                            @error('first_name')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        {{-- Last Name --}}
                        <div class="col-md-6">
                            <label for="last_name">
                                <b> Last Name <span class="text-danger">*</span> </b>
                            </label>
                            <input
                                type="text"
                                name="last_name"
                                id="last_name"
                                class="form-control @error('last_name', $profile->first_name) is-invalid @enderror"
                                value="{{ old('last_name', $profile->last_name) }}"
                                required>
                            @error('last_name')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    {{-- Phone / Github --}}
                    <div class="form-group row">
                        {{-- Phone --}}
                        <div class="col-md-6">
                            <label for="phone">
                                <b> Phone </b>
                            </label>
                            <input
                                type="text"
                                name="phone"
                                id="phone"
                                class="form-control"
                                value="{{ old('phone', $profile->phone) }}">
                        </div>
                        {{-- Github --}}
                        <div class="col-md-6">
                            <label for="github">
                                <b> GitHub </b>
                            </label>
                            <input
                                type="text"
                                name="github"
                                id="github"
                                class="form-control"
                                value="{{ old('github', $profile->github) }}">
                        </div>
                    </div>
                    {{-- Facebook / Twiiter --}}
                    <div class="form-group row">
                        {{-- Facebook --}}
                        <div class="col-md-6">
                            <label for="facebook">
                                <b> Facebook </b>
                            </label>
                            <input
                                type="text"
                                name="facebook"
                                id="facebook"
                                class="form-control"
                                value="{{ old('facebook', $profile->facebook) }}">
                        </div>
                        {{-- Twitter --}}
                        <div class="col-md-6">
                            <label for="twitter">
                                <b> Twitter </b>
                            </label>
                            <input
                                type="text"
                                name="twitter"
                                id="twitter"
                                class="form-control"
                                value="{{ old('twitter', $profile->twitter) }}">
                        </div>
                    </div>
                    {{-- Bio / avatar --}}
                    <div class="form-group row">
                        {{-- Biio --}}
                        <div class="col-md-6">
                            <label for="bio"> <b> Bio </b> </label>
                            <input
                                type="text"
                                name="bio"
                                id="bio"
                                class="form-control"
                                value="{{ old('bio', $profile->bio) }}">
                        </div>
                        {{-- Logo --}}
                        <div class="col-md-6">
                            <label for="admin_email"> <b> Avatar </b> </label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="logoInput">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input
                                        type="file"
                                        class="custom-file-input"
                                        id="avatar"
                                        name="avatar"
                                        aria-describedby="logoInput">
                                    <label class="custom-file-label" for="avatar">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Footer --}}
                <div class="card-footer bg-white">
                    @csrf
                    <div class="form-group row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary float-right">
                                Update <i class="icon-pencil"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
