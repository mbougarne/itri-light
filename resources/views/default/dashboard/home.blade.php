@extends('default.dashboard.layouts.app')

@section('content')
    {{-- Latest Posts --}}
    @include('default.dashboard.includes.latest-posts')
    {{-- Latest Contact Messages --}}
    @include('default.dashboard.includes.latest-contacts')
@endsection
