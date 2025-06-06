<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
     {!! \Artesaos\SEOTools\Facades\SEOMeta::generate() !!}
     {!! \Artesaos\SEOTools\Facades\OpenGraph::generate() !!}
     {!! \Artesaos\SEOTools\Facades\JsonLd::generate() !!}
    
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