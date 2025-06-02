<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="{{ $metaDescription ?? '' }}">
    <meta name="keywords" content="{{ $metaKeywords ?? '' }}">
    <meta property="og:title" content="{{ $metaTitle ?? config('app.name') }}" />
    <meta property="og:description" content="{{ $metaDescription ?? '' }}" />
    <meta property="og:url" content="{{ request()->url() }}" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="{{ asset('images/logo.png') }}" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="{{ $metaTitle ?? config('app.name') }}" />
    <meta name="twitter:description" content="{{ $metaDescription ?? '' }}" />
    <meta name="twitter:image" content="{{ asset('images/logo.png') }}" />
    
    <title>{{ $metaTitle ?? config('app.name') }}</title>
    
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
    @stack('styles')
    
</head>
<body>
    @include('partials.clients.header')
    <main>
        @component('components.auth.register-modal') @endcomponent
        @component('components.auth.login-modal') @endcomponent
        
        @yield('content')
    </main>
    @include('partials.clients.footer')
    
    @routes()
    @stack('scripts')
    @livewireScripts
</body>
</html>