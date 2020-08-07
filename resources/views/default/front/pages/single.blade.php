@extends('default.front.layouts.app')

@section('content')

    @switch($page->template)
        @case('about')
            @include('default.front.pages.templates.about')
            @break
        @case('contact')
            @include('default.front.pages.templates.contact')
            @break
        @default
            @include('default.front.pages.templates.default')
    @endswitch

@endsection
