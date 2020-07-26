<!DOCTYPE html>
<html
    prefix="og: http://ogp.me/ns#"
    lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{ $description ?? '' }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Mourad Bougarne {{ $shared['title'] ?? ' '}}</title>

    {{-- Open graph --}}
    <meta property="og:title" content="{{ $shared['title'] ?? env('APP_NAME') }}" />
    <meta property="og:og:description " content="{{ $description ?? '' }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ env('APP_URL') }}" />
    <meta property="og:image" content="{{ $shared['logo'] ?? '' }}" />

    {{-- Single Post Open Graph --}}
    @yield('article_ogp')

	<link rel="stylesheet" href="{{ asset('assets/css/fonts.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/aos.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

    {{-- Custom CSS --}}
    @yield('custom_css')

    {{-- Header Script --}}
    {{ $shared['header_scripts'] ?? '' }}
</head>
<body>
    {{-- Main Container --}}
	<div id="colorlib-page">
        {{-- Sidebar --}}
        @include('default.dashboard.layouts.sidebar')
        {{-- Main Content --}}
        <div id="colorlib-main">

