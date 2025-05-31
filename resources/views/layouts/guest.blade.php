<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-white antialiased bg-gradient-to-br from-gray-950 via-gray-900 to-gray-950 min-h-screen overflow-x-hidden">
        
        <!-- Floating background orbs -->
        <div class="fixed inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-20 left-10 w-72 h-72 bg-gradient-to-r from-blue-400/20 to-cyan-400/20 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-20 right-10 w-80 h-80 bg-gradient-to-r from-purple-400/20 to-pink-400/20 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-gradient-to-r from-indigo-400/10 to-purple-400/10 rounded-full blur-3xl animate-pulse"></div>
        </div>

        <!-- Top Navigation Bar -->
        <nav class="relative z-50 bg-black/30 backdrop-blur-xl border-b border-white/10">
            <div class="max-w-7xl mx-auto px-4 py-6">
                <div class="flex justify-between items-center">
                    <!-- Logo -->
                    <a href="{{ route('home') }}" class="flex items-center gap-3">
                        <div class="relative">
                            <svg class="w-10 h-10 text-blue-400 drop-shadow-lg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                            </svg>
                            <div class="absolute inset-0 w-10 h-10 bg-blue-500/20 rounded-full blur-xl animate-ping"></div>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-2xl font-black text-transparent bg-clip-text bg-gradient-to-r from-white to-blue-200">
                                FlightTracker
                            </span>
                            <span class="text-blue-400 text-sm font-medium -mt-1">Pro</span>
                        </div>
                    </a>

                    <!-- Navigation Links -->
                    <div class="flex items-center gap-6">
                        <a href="{{ route('home') }}" class="text-gray-300 hover:text-white font-medium transition-colors duration-300">
                            Home
                        </a>
                        
                        @if (request()->routeIs('login'))
                            <span class="text-gray-400">
                                Already have an account? You're in the right place!
                            </span>
                        @elseif (request()->routeIs('register'))
                            <a href="{{ route('login') }}" class="text-gray-300 hover:text-white font-medium transition-colors duration-300">
                                Sign In
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="text-gray-300 hover:text-white font-medium transition-colors duration-300">
                                Login
                            </a>
                            <a href="{{ route('register') }}" class="group relative overflow-hidden bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white font-bold px-6 py-3 rounded-2xl hover:scale-105 transition-all duration-300 hover:shadow-xl hover:shadow-blue-500/25">
                                <span class="relative z-10">Get Started</span>
                                <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content Area -->
        <div class="relative z-10 min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            
            <!-- Content Container -->
            <div class="w-full sm:max-w-md">
                {{ $slot }}
            </div>
            
        </div>

        <!-- Footer -->
        <footer class="relative z-10 bg-gray-900/60 backdrop-blur-xl border-t border-white/10 py-8 mt-auto">
            <div class="max-w-6xl mx-auto px-4 text-center">
                <div class="flex items-center justify-center gap-3 mb-4">
                    <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                    </svg>
                    <span class="text-lg font-bold text-white">FlightTracker Pro</span>
                </div>
                <p class="text-gray-400 text-sm">
                    &copy; {{ date('Y') }} FlightTracker Pro. All rights reserved.
                </p>
            </div>
        </footer>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Set dark mode by default
                document.documentElement.classList.add('dark');
            });
        </script>
    </body>
</html>