@extends('default.dashboard.layouts.app')
{{-- Content --}}
@section('content')
{{-- Create New Service --}}
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
                            action="{{ route('categories.delete', $category->id) }}"
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
                action="{{ route('categories.update', $category->id)}}"
                method="POST">
                {{-- Card Body --}}
                <div class="card-body">
                    {{-- Name --}}
                    <div class="form-group row align-items-center">
                    {{-- Name --}}
                        <div class="col-12">
                            <label for="name">Name</label>
                            <input
                                type="text"
                                name="name"
                                id="name"
                                class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name', $category->name) }}"
                                required>
                            @error('name')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
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
