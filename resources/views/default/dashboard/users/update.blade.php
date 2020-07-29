@extends('default.dashboard.layouts.app')
{{-- Content --}}
@section('content')
{{-- Create New Service --}}
<div class="row">
    <div class="col-12">
        {{-- Create Form --}}
        <form action="{{ route('user.update')}}" method="POST">
            {{-- Card --}}
            <div class="card" id="settings-card">
                {{-- Card Header --}}
                <div class="card-header bg-white">
                    <h4>{{ $title }}</h4>
                </div>
                {{-- Card Body --}}
                <div class="card-body">
                    {{-- Username --}}
                    <div class="form-group row align-items-center">
                        <div class="col-12">
                            <label for="username">Username</label>
                            <input
                                type="text"
                                name="username"
                                class="form-control @error('username') is-invalid @enderror"
                                id="username"
                                value="{{ old('username', $user->username) }}"
                                required>
                            @error('username')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    {{-- Email --}}
                    <div class="form-group row align-items-center">
                        <div class="col-12">
                            <label for="email">Email</label>
                            <input
                                type="email"
                                name="email"
                                class="form-control @error('email') is-invalid @enderror"
                                id="email"
                                value="{{ old('email', $user->email) }}"
                                required>
                            @error('email')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    {{-- Password --}}
                    <div class="form-group row align-items-center">
                        <div class="col-12">
                            <label for="password">Password</label>
                            <input
                                type="password"
                                name="password"
                                class="form-control @error('password') is-invalid @enderror"
                                id="password"
                                value="{{ old('password') }}">
                            @error('password')
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
                            Update <i class="icon-pencil"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
