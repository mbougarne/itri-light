@extends('default.dashboard.layouts.app')
{{-- Content --}}
@section('content')
{{-- Create New Service --}}
<div class="row">
    <div class="col-12">
        {{-- Create Form --}}
        <form
            action="{{ route('categories.create')}}"
            method="POST">
            {{-- Card --}}
            <div class="card" id="settings-card">
                {{-- Card Header --}}
                <div class="card-header bg-white">
                    <h4>Create New Category</h4>
                </div>
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
                                class="form-control @error('name') is-invalid @enderror"
                                id="name"
                                value="{{ old('name') }}"
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
