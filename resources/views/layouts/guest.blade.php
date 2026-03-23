<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script>
        if (localStorage.getItem('theme') === 'dark') {
            document.documentElement.classList.add('dark');
            }
        </script>

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div 
            class="min-h-screen bg-[var(--bg)] text-[var(--text)]"           
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

            <footer class="bg-[var(--brand-dark-blue)] dark:bg-gray-900 text-white border-t border-gray-200 dark:border-gray-700">
                <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8 text-center">
                    <p>&copy; {{ date('Y') }} Educart. All rights reserved.</p>
                    <p class="mt-2 text-sm">Smart Shopping for Your Academic Life</p>
                </div>
            </footer>
            
            <x-toast />
            
        </div>
        <button id="theme-toggle" class="fixed bottom-6 right-6 z-50 p-3 rounded-full shadow-lg bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 border border-gray-300 dark:border-gray-700 hover:scale-105 transition transform">
        <!-- Sun icon (light mode) -->
         <svg class="h-6 w-6 block dark:hidden" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 4V2m0 20v-2m10-8h-2M4 12H2m15.364-7.364l-1.414 1.414M7.05 16.95l-1.414 1.414m12.728 0l-1.414-1.414M7.05 7.05L5.636 5.636M12 8a4 4 0 100 8 4 4 0 000-8z"/>
        </svg>
        <!-- Moon icon (dark mode) -->
        <svg class="h-6 w-6 hidden dark:block" fill="currentColor" viewBox="0 0 20 20">
             <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"/>
        </svg>
        </button>
    <script>
    document.getElementById('theme-toggle').addEventListener('click', () => {
        const html = document.documentElement;
        const isDark = html.classList.toggle('dark');
        localStorage.setItem('theme', isDark ? 'dark' : 'light');
        });
    </script>
    </body>
</html>