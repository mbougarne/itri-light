<!DOCTYPE html>
<html
    prefix="og: http://ogp.me/ns#"
    lang="{{ app_language() }}">

<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{ app_description() }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Mourad Bougarne &mdash; {{ $title ?? ' '}}</title>

    <link rel="shortcut icon" href="{{ app_favicon() }}" type="image/x-icon">

    {{-- Single Post Open Graph --}}
    @yield('article_ogp')

    <link rel="stylesheet" href="{{ asset('assets/izitoast/css/iziToast.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/fonts.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/aos.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

    {{-- Custom CSS --}}
    @yield('custom_css')

    {{-- Header Script --}}
    {{ app_header_scripts() }}
</head>
<body>
    {{-- Main Container --}}
	<div id="colorlib-page">
        {{-- Sidebar --}}
        @include('default.dashboard.layouts.sidebar')
        {{-- Main Content --}}
        <div id="colorlib-main">

