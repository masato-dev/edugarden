<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="google-site-verification" content="PW_uZYORIGtCWFvKcmzfGX2h9Vk4mEIIanej2_lut9g" />
     {!! \Artesaos\SEOTools\Facades\SEOMeta::generate() !!}
     {!! \Artesaos\SEOTools\Facades\OpenGraph::generate() !!}
     {!! \Artesaos\SEOTools\Facades\JsonLd::generate() !!}
    
    <title>{{ $metaTitle ?? config('app.name') }}</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
    @stack('styles')
    
</head>
<body>
    @include('partials.clients.header')
    <main>
        @component('components.auth.register-modal') @endcomponent
        @component('components.auth.login-modal') @endcomponent
        @component('components.auth.forgot-password-modal') @endcomponent
        
        @yield('content')
    </main>
    @include('partials.clients.footer')
    
    @routes()
    @stack('scripts')
    @livewireScripts
    <ai360-chatbot
        style="Serious"
        primary-color="#8BC34A"
        avatar-shape="circle"
        font-size="16"
        chat-position="right"
        bot-avatar=""
        icon=""
        chatbox-width="300"
        chatbox-height="500"
        font-color="#FFFFFF"
        field="education"
        name="Chatbot Kinh Thánh"
        uuid="2d161d0a-0d01-4b27-a522-2208efb0f136"
    >
    </ai360-chatbot>
                
    <script src="https://ai.rada360.com/libs/ai360-chatbot-lib.min.js"></script>
</body>
</html>