<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Tracker Pro</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gradient-to-br from-gray-950 via-gray-900 to-gray-950 text-white min-h-screen overflow-x-hidden">
    
    <!-- Floating background orbs -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-20 left-10 w-72 h-72 bg-gradient-to-r from-blue-400/20 to-cyan-400/20 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-20 right-10 w-80 h-80 bg-gradient-to-r from-purple-400/20 to-pink-400/20 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-gradient-to-r from-indigo-400/10 to-purple-400/10 rounded-full blur-3xl animate-pulse"></div>
    </div>

    <!-- Navbar -->
    <nav class="relative z-50 bg-black/30 backdrop-blur-xl border-b border-white/10">
        <div class="max-w-7xl mx-auto px-4 py-6">
            <div class="flex justify-between items-center">
                <!-- Logo -->
                <div class="flex items-center gap-3">
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
                </div>

                <!-- Navigation -->
                <div class="flex items-center gap-6">
                    @auth
                        <a href="{{ route('flights.index') }}" class="group relative overflow-hidden bg-white/10 hover:bg-white/20 backdrop-blur-xl border border-white/20 text-white font-semibold px-6 py-3 rounded-2xl hover:scale-105 transition-all duration-300 hover:shadow-xl hover:shadow-blue-500/25">
                            <span class="relative z-10 flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                </svg>
                                Dashboard
                            </span>
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-300 hover:text-white font-medium transition-colors duration-300">Login</a>
                        <a href="{{ route('register') }}" class="group relative overflow-hidden bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white font-bold px-8 py-3 rounded-2xl hover:scale-105 transition-all duration-300 hover:shadow-xl hover:shadow-blue-500/25">
                            <span class="relative z-10">Get Started</span>
                            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative py-32 overflow-hidden">
        <div class="relative z-10 max-w-6xl mx-auto px-4 text-center">
            <!-- Main Hero Content -->
            <div class="space-y-8">
                <h1 class="text-6xl md:text-8xl font-black text-transparent bg-clip-text bg-gradient-to-r from-white via-blue-200 to-purple-200 tracking-tight leading-tight">
                    Track Flights
                    <span class="block text-5xl md:text-7xl bg-gradient-to-r from-blue-400 to-purple-500 bg-clip-text text-transparent font-extrabold">
                        in Real-Time
                    </span>
                </h1>
                
                <p class="text-xl md:text-2xl text-gray-300 max-w-3xl mx-auto leading-relaxed font-medium">
                    Experience next-generation flight tracking with stunning visuals, real-time data, and instant notifications. Never miss an update again.
                </p>

                @guest
                    <div class="pt-4">
                        <a href="{{ route('register') }}" class="group relative inline-block">
                            <!-- Glowing border effect -->
                            <div class="absolute -inset-1 bg-gradient-to-r from-blue-600 via-purple-600 to-blue-600 rounded-3xl blur opacity-30 group-hover:opacity-60 transition duration-1000"></div>
                            
                            <!-- Main button -->
                            <div class="relative bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white font-bold px-12 py-6 rounded-3xl text-xl hover:scale-105 transition-all duration-300 hover:shadow-2xl hover:shadow-blue-500/25">
                                <span class="relative z-10 flex items-center gap-3">
                                    Start Tracking Now
                                    <svg class="w-6 h-6 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                    </svg>
                                </span>
                            </div>
                        </a>
                    </div>
                @endguest
            </div>

            <!-- Hero Visual Element -->
            <div class="mt-24">
                <div class="relative max-w-4xl mx-auto">
                    <!-- Simulated flight path -->
                    <div class="flex items-center justify-between mb-12">
                        <div class="text-center">
                            <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-full mx-auto mb-4 flex items-center justify-center shadow-xl shadow-blue-500/25">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <p class="text-white font-bold text-lg">LHR</p>
                            <p class="text-gray-400 text-sm">London</p>
                        </div>
                        
                        <div class="flex-1 relative mx-8">
                            <div class="h-0.5 bg-gradient-to-r from-blue-500 to-purple-500 relative">
                                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                                    <svg class="w-8 h-8 text-white rotate-90 animate-pulse" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M21 16v-2l-8-5V3.5c0-.83-.67-1.5-1.5-1.5S10 2.67 10 3.5V9l-8 5v2l8-2.5V19l-2 1.5V22l3.5-1 3.5 1v-1.5L13 19v-5.5l8 2.5z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        
                        <div class="text-center">
                            <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full mx-auto mb-4 flex items-center justify-center shadow-xl shadow-purple-500/25">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <p class="text-white font-bold text-lg">JFK</p>
                            <p class="text-gray-400 text-sm">New York</p>
                        </div>
                    </div>
                    
                    <!-- Status badge -->
                    <div class="flex justify-center">
                        <span class="inline-flex items-center px-6 py-3 rounded-full text-sm font-bold text-white bg-gradient-to-r from-emerald-500 to-green-400 shadow-xl shadow-emerald-500/25">
                            <span class="w-2 h-2 bg-white rounded-full mr-3 animate-pulse"></span>
                            Flight Active • On Time
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features -->
    <section class="relative py-24 bg-gray-900/50 backdrop-blur-xl">
        <div class="max-w-6xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-black text-transparent bg-clip-text bg-gradient-to-r from-white to-blue-200 mb-6">
                    Why Choose FlightTracker Pro?
                </h2>
                <p class="text-xl text-gray-300 max-w-2xl mx-auto">
                    Built for modern travelers who demand the best in flight tracking technology.
                </p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="group relative">
                    <div class="absolute -inset-1 bg-gradient-to-r from-blue-600 to-cyan-600 rounded-3xl blur opacity-20 group-hover:opacity-40 transition duration-500"></div>
                    <div class="relative bg-gray-900/80 backdrop-blur-xl rounded-3xl p-8 border border-gray-800/50 hover:scale-105 transition-all duration-500">
                        <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-2xl flex items-center justify-center mb-6 shadow-xl shadow-blue-500/25">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-4">Live Flight Data</h3>
                        <p class="text-gray-400 leading-relaxed">
                            Real-time updates from trusted aviation APIs. Track departures, arrivals, delays, and gate changes instantly with military-grade precision.
                        </p>
                    </div>
                </div>

                <!-- Feature 2 -->
                <div class="group relative">
                    <div class="absolute -inset-1 bg-gradient-to-r from-emerald-600 to-green-600 rounded-3xl blur opacity-20 group-hover:opacity-40 transition duration-500"></div>
                    <div class="relative bg-gray-900/80 backdrop-blur-xl rounded-3xl p-8 border border-gray-800/50 hover:scale-105 transition-all duration-500">
                        <div class="w-16 h-16 bg-gradient-to-r from-emerald-500 to-green-500 rounded-2xl flex items-center justify-center mb-6 shadow-xl shadow-emerald-500/25">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-4">Intuitive Design</h3>
                        <p class="text-gray-400 leading-relaxed">
                            Clean, modern interface designed for ease of use. No clutter, no confusion – just beautiful flight tracking that works perfectly every time.
                        </p>
                    </div>
                </div>

                <!-- Feature 3 -->
                <div class="group relative">
                    <div class="absolute -inset-1 bg-gradient-to-r from-purple-600 to-pink-600 rounded-3xl blur opacity-20 group-hover:opacity-40 transition duration-500"></div>
                    <div class="relative bg-gray-900/80 backdrop-blur-xl rounded-3xl p-8 border border-gray-800/50 hover:scale-105 transition-all duration-500">
                        <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-pink-500 rounded-2xl flex items-center justify-center mb-6 shadow-xl shadow-purple-500/25">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-5 5v-5zM9 7H4l5-5v5zM21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-4">Smart Notifications</h3>
                        <p class="text-gray-400 leading-relaxed">
                            <span class="text-amber-400 font-semibold">(Coming Soon)</span> Intelligent alerts for status changes, delays, and gate updates delivered instantly via email and SMS.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="relative bg-gray-900/60 backdrop-blur-xl border-t border-white/10 py-12">
        <div class="max-w-6xl mx-auto px-4 text-center">
            <div class="flex items-center justify-center gap-3 mb-6">
                <svg class="w-8 h-8 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                </svg>
                <span class="text-xl font-bold text-white">FlightTracker Pro</span>
            </div>
            <p class="text-gray-400">
                &copy; {{ date('Y') }} FlightTracker Pro. All rights reserved. Built with ❤️ for modern travelers.
            </p>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Set dark mode by default
            document.documentElement.classList.add('dark');
            
            // Add some smooth scroll behavior
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    document.querySelector(this.getAttribute('href')).scrollIntoView({
                        behavior: 'smooth'
                    });
                });
            });
        });
    </script>

</body>
</html>