<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    
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