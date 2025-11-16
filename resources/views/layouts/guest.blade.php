<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-brand-dark antialiased">
        <div 
            class="min-h-screen flex flex-col bg-brand-cream"
            x-data="authModal({ 
                open: {{ $errors->any() && session('auth_modal_form') ? 'true' : 'false' }}, 
                initialView: '{{ session('auth_modal_form', 'login') }}' 
            })"
            x-init="
                @if (session('status'))
                    Alpine.store('toast').show('{{ session('status') }}', 'success');
                @endif
            "
        >
            @include('layouts.navigation')

            <main class="flex-grow">
                {{ $slot }}
            </main>

            <x-auth-modal />

            <footer class="bg-brand-dark-blue text-brand-gray">
                <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8 text-center">
                    <p>&copy; {{ date('Y') }} Educart. All rights reserved.</p>
                    <p class="mt-2 text-sm">Smart Shopping for Your Academic Life</p>
                </div>
            </footer>
            
            <x-toast />
            
        </div>
    </body>
</html>