<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row justify-between items-center gap-4 relative">
            <!-- Background gradient orb -->
            <div class="absolute -top-20 -left-20 w-40 h-40 bg-gradient-to-r from-blue-500/20 to-purple-500/20 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute -top-10 -right-10 w-32 h-32 bg-gradient-to-r from-cyan-500/20 to-blue-500/20 rounded-full blur-2xl animate-pulse delay-1000"></div>
            
            <h2 class="text-3xl font-black text-transparent bg-clip-text bg-gradient-to-r from-white via-purple-300 to-white flex items-center gap-3 relative z-10">
                <div class="relative">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-9 h-9 text-blue-400 drop-shadow-lg animate-bounce">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.25c.621-1.063.75-2.25.75-3.75a8.25 8.25 0 10-8.25 8.25c1.5 0 2.687-.129 3.75-.75L21 21l1.5-1.5-2.25-2.25z" />
                    </svg>
                    <div class="absolute inset-0 w-9 h-9 bg-blue-500/20 rounded-full blur-xl animate-ping"></div>
                </div>
                <span class="tracking-tight">Your Tracked Flights</span>
            </h2>

            <div class="flex items-center gap-6 relative z-10">
                <!-- Logout -->
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="group relative overflow-hidden bg-gradient-to-r from-red-500 to-pink-500 text-white font-semibold px-6 py-3 rounded-2xl hover:scale-105 hover:shadow-xl hover:shadow-red-500/25 transition-all duration-300">
                        <span class="relative z-10">Logout</span>
                        <div class="absolute inset-0 bg-gradient-to-r from-red-600 to-pink-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </button>
                </form>
            </div>
        </div>
    </x-slot>

    <!-- Main Background with animated gradients -->
    <div class="relative min-h-[92vh] overflow-hidden">
        <!-- Animated background -->
        <div class="absolute inset-0 bg-gradient-to-br from-gray-950 via-blue-950/50 to-indigo-950/30"></div>
        
        <!-- Floating orbs -->
        <div class="absolute top-20 left-10 w-72 h-72 bg-gradient-to-r from-blue-400/20 to-cyan-400/20 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-20 right-10 w-80 h-80 bg-gradient-to-r from-purple-400/20 to-pink-400/20 rounded-full blur-3xl animate-pulse delay-2000"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-gradient-to-r from-indigo-400/10 to-purple-400/10 rounded-full blur-3xl animate-pulse delay-1000"></div>
        
        <div class="relative z-10 py-16 px-4 sm:px-6 lg:px-8">
            <!-- Hero Section -->
            <div class="max-w-4xl mx-auto text-center mb-16">
                <div class="relative">
                    <!-- Glowing title -->
                    <h1 class="text-6xl md:text-7xl font-black text-transparent bg-clip-text bg-gradient-to-r from-white via-blue-200 to-purple-200 mb-6 tracking-tight leading-tight">
                        Track Your Flights
                        <span class="block text-5xl md:text-6xl bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent font-extrabold">Live</span>
                    </h1>
                    
                    <!-- Subtitle with premium styling -->
                    <p class="text-xl text-gray-300 mb-12 max-w-2xl mx-auto leading-relaxed font-medium">
                        Experience next-generation flight tracking with real-time data, stunning visuals, and instant notifications.
                    </p>

                    <!-- Premium Search Form -->
                    <form action="{{ route('flights.store') }}" method="POST" class="max-w-2xl mx-auto group">
                        @csrf
                        <div class="relative">
                            <!-- Glowing border effect -->
                            <div class="absolute -inset-1 bg-gradient-to-r from-blue-600 via-purple-600 to-blue-600 rounded-3xl blur opacity-30 group-hover:opacity-60 transition duration-1000 group-hover:duration-200 animate-tilt"></div>
                            
                            <!-- Main search container -->
                            <div class="relative bg-gray-900/80 backdrop-blur-xl rounded-3xl p-2 shadow-2xl border border-gray-700/50">
                                <div class="flex items-center">
                                    <!-- Search icon -->
                                    <div class="pl-6">
                                        <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                        </svg>
                                    </div>
                                    
                                    <!-- Input field -->
                                    <input type="text" name="flight_code" placeholder="Enter flight code (e.g. BA256, AA100)"
                                        class="flex-grow px-6 py-5 text-lg font-medium text-white bg-transparent focus:outline-none placeholder-gray-400 border-0"
                                        required>
                                    
                                    <!-- Premium button -->
                                    <button class="group/btn relative overflow-hidden bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white font-bold px-8 py-5 rounded-2xl transition-all duration-300 hover:scale-105 hover:shadow-xl hover:shadow-blue-500/25">
                                        <span class="relative z-10 flex items-center gap-2">
                                            Track Flight
                                            <svg class="w-5 h-5 transform group-hover/btn:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                            </svg>
                                        </span>
                                        
                                        <!-- Button shine effect -->
                                        <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover/btn:translate-x-full transition-transform duration-1000"></div>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Notifications -->
            @if(session('success'))
                <div class="max-w-4xl mx-auto mb-8">
                    <div class="bg-gradient-to-r from-green-500 to-emerald-500 text-white p-6 rounded-3xl shadow-2xl border-l-4 border-green-300 backdrop-blur-xl animate-slide-down">
                        <div class="flex items-center gap-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="font-semibold">{{ session('success') }}</span>
                        </div>
                    </div>
                </div>
            @endif

            @if(session('error'))
                <div class="max-w-4xl mx-auto mb-8">
                    <div class="bg-gradient-to-r from-red-500 to-pink-500 text-white p-6 rounded-3xl shadow-2xl border-l-4 border-red-300 backdrop-blur-xl animate-slide-down">
                        <div class="flex items-center gap-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="font-semibold">{{ session('error') }}</span>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Flight Cards Grid -->
            <div class="max-w-7xl mx-auto">
                <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                    @forelse($flights as $flight)
                        @php
                            // Get basic flight info
                            $apiStatus = $flight->flight_data['flight_status'] ?? 'unknown';
                            
                            // Get scheduled times (in UTC from API)
                            $scheduledDeparture = $flight->flight_data['departure']['scheduled'] ?? null;
                            $scheduledArrival = $flight->flight_data['arrival']['scheduled'] ?? null;
                            
                            // Get actual/estimated times
                            $actualDeparture = $flight->flight_data['departure']['actual'] ?? null;
                            $estimatedDeparture = $flight->flight_data['departure']['estimated'] ?? null;
                            $actualArrival = $flight->flight_data['arrival']['actual'] ?? null;
                            $estimatedArrival = $flight->flight_data['arrival']['estimated'] ?? null;

                            // 🔥 PERFECT LOGIC: Check what data actually exists
                            $hasActualDeparture = !empty($actualDeparture);
                            $hasActualArrival = !empty($actualArrival);
                            
                            // Parse times for calculations
                            $depTimeUTC = $scheduledDeparture ? \Carbon\Carbon::parse($scheduledDeparture) : null;
                            $arrTimeUTC = $scheduledArrival ? \Carbon\Carbon::parse($scheduledArrival) : null;
                            $actualDepTimeUTC = $actualDeparture ? \Carbon\Carbon::parse($actualDeparture) : null;
                            $actualArrTimeUTC = $actualArrival ? \Carbon\Carbon::parse($actualArrival) : null;
                            $estimatedArrTimeUTC = $estimatedArrival ? \Carbon\Carbon::parse($estimatedArrival) : null;
                            
                            $status = $apiStatus;
                            $smartAlert = '';
                            $progress = 0;
                            $timeRemaining = '';
                            
                            // SMART STATUS DETECTION based on data availability
                            // SMART STATUS DETECTION based on data availability
                            if ($scheduledDeparture && $scheduledArrival) {
                                try {
                                    if ($hasActualArrival) {
                                        // Has REAL actual arrival time = DEFINITELY LANDED
                                        $status = 'landed';
                                        $progress = 100;
                                        $smartAlert = "🛬 Landed";
                                        
                                    } elseif ($hasActualDeparture) {
                                        // Has actual departure but no actual arrival = IN FLIGHT
                                        $status = 'active';
                                        
                                        // 🔥 CALCULATE REAL PROGRESS BASED ON ACTUAL FLIGHT TIME
                                        // 🔥 FIXED PROGRESS CALCULATION - BULLETPROOF VERSION
                                    try {
                                        // Parse times
                                        $actualDepTime = \Carbon\Carbon::parse($actualDeparture)->utc();
                                        $currentTime = \Carbon\Carbon::now()->utc();
                                        $arrivalTimeString = $estimatedArrival ?: $scheduledArrival;
                                        $arrivalTime = \Carbon\Carbon::parse($arrivalTimeString)->utc();
                                        
                                        // Calculate elapsed time since actual departure
                                        $elapsedMinutes = $actualDepTime->diffInMinutes($currentTime);
                                        
                                        // For in-flight calculations, we need to use REMAINING time to arrival
                                        // instead of scheduled total time, because flight times can change due to:
                                        // - Wind conditions
                                        // - Air traffic control
                                        // - Route changes
                                        // - Weather diversions
                                        
                                        $remainingMinutes = $currentTime->diffInMinutes($arrivalTime);
                                        
                                        // Calculate ACTUAL total flight time (elapsed + remaining)
                                        $actualTotalMinutes = $elapsedMinutes + $remainingMinutes;
                                        
                                        Log::info("Corrected Flight progress calculation", [
                                            'flight' => $flight->flight_code,
                                            'elapsed_since_departure' => [
                                                'minutes' => $elapsedMinutes,
                                                'formatted' => sprintf('%dh %02dm', floor($elapsedMinutes / 60), $elapsedMinutes % 60)
                                            ],
                                            'remaining_to_arrival' => [
                                                'minutes' => $remainingMinutes,
                                                'formatted' => sprintf('%dh %02dm', floor($remainingMinutes / 60), $remainingMinutes % 60)
                                            ],
                                            'actual_total_flight_time' => [
                                                'minutes' => $actualTotalMinutes,
                                                'formatted' => sprintf('%dh %02dm', floor($actualTotalMinutes / 60), $actualTotalMinutes % 60)
                                            ],
                                            'your_example' => [
                                                'elapsed_example' => '1h 23m = 83 minutes',
                                                'remaining_example' => '5h 03m = 303 minutes', 
                                                'total_example' => '83 + 303 = 386 minutes',
                                                'progress_example' => '83/386 = 21.5%'
                                            ]
                                        ]);
                                        
                                        // Determine flight state
                                        $hasActuallyDeparted = $currentTime->greaterThan($actualDepTime);
                                        $hasAlreadyArrived = $currentTime->greaterThan($arrivalTime);
                                        
                                        if ($hasAlreadyArrived) {
                                            $status = 'landed';
                                            $progress = 100;
                                            $smartAlert = "🛬 Landed";
                                            $timeRemaining = '';
                                            
                                        } elseif (!$hasActuallyDeparted) {
                                            $status = 'scheduled';
                                            $progress = 0;
                                            $smartAlert = "📅 Not yet departed";
                                            $timeRemaining = '';
                                            
                                        } else {
                                            // Flight is in progress - use REAL calculation
                                            $status = 'active';
                                            
                                            if ($actualTotalMinutes > 0) {
                                                // ✅ CORRECT: Progress based on actual elapsed vs actual total
                                                $progress = ($elapsedMinutes / $actualTotalMinutes) * 100;
                                                $progress = min(99, max(1, round($progress, 1)));
                                            } else {
                                                $progress = 50; // Fallback
                                            }
                                            
                                            // Format remaining time
                                            if ($remainingMinutes > 0) {
                                                $hoursRemaining = floor($remainingMinutes / 60);
                                                $minutesRemaining = $remainingMinutes % 60;
                                                
                                                if ($hoursRemaining > 0) {
                                                    $timeRemaining = sprintf('%dh %02dm remaining', $hoursRemaining, $minutesRemaining);
                                                } else {
                                                    $timeRemaining = sprintf('%dm remaining', $minutesRemaining);
                                                }
                                            } else {
                                                $timeRemaining = 'Landing soon';
                                            }
                                            
                                            // Create smart alert
                                            if ($estimatedArrival) {
                                                $estimatedTime = \Carbon\Carbon::parse($estimatedArrival)->format('H:i');
                                                $smartAlert = "✈️ In Flight - Est. landing {$estimatedTime} UTC";
                                            } else {
                                                $smartAlert = "✈️ In Flight";
                                            }
                                        }
                                        
                                    } catch (\Exception $e) {
                                        Log::error("Progress calculation error", [
                                            'flight' => $flight->flight_code,
                                            'error' => $e->getMessage(),
                                        ]);
                                        
                                        $status = 'active';
                                        $progress = 50;
                                        $timeRemaining = 'Calculation unavailable';
                                        $smartAlert = "✈️ In Flight";
                                    }
                                        

                                    //END OF FIXES HERE
                                        // Show estimated landing time if available
                                        if ($estimatedArrival) {
                                            $estimatedTime = \Carbon\Carbon::parse($estimatedArrival)->format('H:i');
                                            $smartAlert = "✈️ In Flight - Est. landing {$estimatedTime}";
                                        } else {
                                            $smartAlert = "✈️ In Flight";
                                        }
                                        
                                    } elseif ($apiStatus === 'landed') {
                                        // API says landed = TRUST API
                                        $status = 'landed';
                                        $progress = 100;
                                        $smartAlert = "🛬 Landed";
                                        $timeRemaining = '';
                                        
                                    } elseif ($apiStatus === 'active') {
                                        // API says active but no actual departure = LIKELY IN FLIGHT
                                        $status = 'active';
                                        $progress = 50;
                                        $smartAlert = "✈️ Likely in flight";
                                        $timeRemaining = '';
                                        
                                    } else {
                                        // No actual departure time = SCHEDULED
                                        $status = 'scheduled';
                                        $progress = 0;
                                        $smartAlert = "📅 Scheduled departure " . ($depTimeUTC ? $depTimeUTC->format('H:i') : 'TBA') . " UTC";
                                        $timeRemaining = '';
                                    }
                                    
                                    // Handle cancelled/incident statuses
                                    if (in_array($apiStatus, ['cancelled', 'incident', 'diverted'])) {
                                        $status = $apiStatus;
                                        $smartAlert = match($apiStatus) {
                                            'cancelled' => "❌ Flight Cancelled",
                                            'incident' => "⚠️ Flight Incident",
                                            'diverted' => "🔄 Flight Diverted",
                                        };
                                        $progress = 0;
                                        $timeRemaining = '';
                                    }
                                    
                                } catch (\Exception $e) {
                                    $smartAlert = "⚠️ Time data unavailable";
                                    $status = $apiStatus;
                                    $progress = 0;
                                    $timeRemaining = '';
                                }
                            } else {
                                $smartAlert = "⚠️ Flight data incomplete";
                                $status = $apiStatus;
                                $progress = 0;
                                $timeRemaining = '';
                            }
                            
                            // Status styling based on our corrected status
                            $statusClasses = match($status) {
                                'active' => 'from-emerald-500 to-green-400 shadow-emerald-500/25',
                                'landed' => 'from-gray-500 to-slate-400 shadow-gray-500/25',
                                'cancelled' => 'from-red-500 to-pink-400 shadow-red-500/25',
                                'incident' => 'from-orange-500 to-red-400 shadow-orange-500/25',
                                'diverted' => 'from-yellow-500 to-orange-400 shadow-yellow-500/25',
                                default => 'from-blue-500 to-indigo-400 shadow-blue-500/25',
                            };
                            
                            $borderColor = match($status) {
                                'active' => 'border-l-emerald-400',
                                'landed' => 'border-l-gray-400',
                                'cancelled' => 'border-l-red-400',
                                'incident' => 'border-l-orange-400',
                                'diverted' => 'border-l-yellow-400',
                                default => 'border-l-blue-400',
                            };

                            // Get real weather data using WeatherService
                            $weatherService = app(\App\Services\WeatherService::class);
                            $departureWeather = $weatherService->getAirportWeather($flight->flight_data['departure']['iata'] ?? 'JFK');
                            $arrivalWeather = $weatherService->getAirportWeather($flight->flight_data['arrival']['iata'] ?? 'LAX');
                        @endphp

                        <!-- Debug Panel - Clean and Simple -->
                        <div class="mb-4 p-3 bg-blue-500/10 border border-blue-500/20 rounded-lg text-xs">
                            <strong>🔍 Raw API Data:</strong><br>
                            Scheduled Departure: {{ json_encode($scheduledDeparture) }}<br>
                            Actual Departure: {{ json_encode($actualDeparture) }}<br>
                            Scheduled Arrival: {{ json_encode($scheduledArrival) }}<br>
                            Actual Arrival: {{ json_encode($actualArrival) }}<br>
                            Estimated Arrival: {{ json_encode($estimatedArrival) }}<br>
                            Flight Status: {{ json_encode($apiStatus) }}
                        </div>
                        
                        <div class="mb-4 p-3 bg-orange-500/10 border border-orange-500/20 rounded-lg text-xs">
                            <strong>🛩️ Flight Data Logic:</strong><br>
                            Has Actual Departure? {{ $hasActualDeparture ? 'YES' : 'NO' }}<br>
                            Has Actual Arrival? {{ $hasActualArrival ? 'YES' : 'NO' }}<br>
                            API Status: {{ $apiStatus }}<br>
                            Logic: 
                            @if($hasActualArrival)
                                Has arrival time → LANDED
                            @elseif($hasActualDeparture)
                                Has departure time → IN FLIGHT
                            @elseif($apiStatus === 'active')
                                API says active → LIKELY IN FLIGHT
                            @else
                                No departure data → SCHEDULED
                            @endif
                            <br>
                            Final Status: {{ $status }}<br>
                            Final Alert: {{ $smartAlert }}
                        </div>

                        <div class="group relative">
                            <!-- Card glow effect -->
                            <div class="absolute -inset-1 bg-gradient-to-r {{ $statusClasses }} rounded-3xl blur opacity-20 group-hover:opacity-40 transition duration-500"></div>
                            
                            <!-- Main card -->
                            <div class="relative bg-gray-900/90 backdrop-blur-2xl rounded-3xl shadow-2xl hover:shadow-3xl border {{ $borderColor }} border-l-4 border-t border-r border-b border-gray-800/50 p-8 transition-all duration-500 hover:scale-[1.02] hover:-translate-y-2">
                                
                                <!-- Status indicator with pulse -->
                                <div class="absolute top-4 right-4">
                                    <div class="relative">
                                        <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-bold text-white bg-gradient-to-r {{ $statusClasses }} shadow-lg">
                                            <span class="w-2 h-2 bg-white rounded-full mr-2 animate-pulse"></span>
                                            {{ ucfirst($status) }}
                                        </span>
                                    </div>
                                </div>

                                <!-- Airline Header -->
                                <div class="mb-6">
                                    <h3 class="text-2xl font-black text-white mb-2 tracking-tight">
                                        {{ $flight->flight_data['airline']['name'] ?? 'Unknown Airline' }}
                                    </h3>
                                    <p class="text-lg font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600">
                                        Flight {{ $flight->flight_code }}
                                    </p>
                                </div>

                                <!-- Smart Status Alert -->
                                @if($smartAlert)
                                    <div class="mb-6 p-4 bg-gradient-to-r from-blue-500/20 to-purple-500/20 rounded-2xl border border-blue-500/30 backdrop-blur-xl">
                                        <div class="flex items-center gap-3">
                                            <div class="w-3 h-3 bg-blue-400 rounded-full animate-pulse"></div>
                                            <span class="text-blue-200 font-semibold">{{ $smartAlert }}</span>
                                        </div>
                                    </div>
                                @endif

                                <!-- Live Progress Bar -->
                                @if(in_array($status, ['active', 'landed']))
                                    <div class="mb-6">
                                        <div class="flex items-center justify-between mb-2">
                                            <span class="text-sm font-semibold text-gray-300">Flight Progress</span>
                                            <span class="text-sm font-bold text-blue-400">{{ number_format($progress, 1) }}%</span>
                                        </div>
                                        <div class="w-full bg-gray-700/50 rounded-full h-3 overflow-hidden">
                                            <div class="bg-gradient-to-r from-blue-500 to-purple-500 h-3 rounded-full transition-all duration-1000 ease-out relative"
                                                style="width: {{ $progress }}%">
                                                <!-- Animated shine effect -->
                                                <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/30 to-transparent -skew-x-12 animate-pulse"></div>
                                            </div>
                                        </div>
                                        @if($timeRemaining)
                                            <div class="text-center mt-2">
                                                <span class="text-sm text-gray-400">ETA: {{ $timeRemaining }}</span>
                                            </div>
                                        @endif
                                    </div>
                                @endif

                                <!-- Flight Route with Enhanced Terminal/Gate Info -->
                                <div class="grid grid-cols-2 gap-6 mb-8">
                                    <!-- Departure -->
                                    <div class="space-y-3">
                                        <div class="flex items-center gap-2">
                                            <div class="w-3 h-3 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-full"></div>
                                            <h4 class="font-bold text-white text-lg">Departure</h4>
                                        </div>
                                        
                                        <div class="space-y-3 text-sm">
                                            <p class="font-bold text-gray-200">
                                                {{ $flight->flight_data['departure']['airport'] ?? 'N/A' }}
                                            </p>
                                            <p class="text-2xl font-black text-white">
                                                {{ $flight->flight_data['departure']['iata'] ?? '--' }}
                                            </p>
                                            
                                            <!-- Display both scheduled and actual times in local format -->
                                            <div class="space-y-1">
                                                <p class="font-semibold text-gray-400">
                                                    Scheduled: {{ $scheduledDeparture ? \Carbon\Carbon::parse($scheduledDeparture)->format('D, H:i') : 'N/A' }}
                                                </p>
                                                @if($actualDeparture && $actualDeparture !== $scheduledDeparture)
                                                    <p class="font-semibold text-green-400">
                                                        Actual: {{ \Carbon\Carbon::parse($actualDeparture)->format('D, H:i') }}
                                                    </p>
                                                @endif
                                            </div>
                                            
                                            <!-- Real Weather Info -->
                                            <div class="bg-gray-800/50 rounded-xl p-3 border border-gray-700/50">
                                                <div class="flex items-center justify-between">
                                                    <div class="flex items-center gap-2">
                                                        <span class="text-lg">{{ $departureWeather['icon'] }}</span>
                                                        <span class="text-xs font-medium text-gray-300 capitalize">{{ $departureWeather['condition'] }}</span>
                                                    </div>
                                                    <span class="text-sm font-bold text-white">{{ $departureWeather['temp'] }}°C</span>
                                                </div>
                                            </div>
                                            
                                            <!-- Enhanced Terminal & Gate Info -->
                                            <div class="flex flex-wrap gap-2">
                                                @php
                                                    $terminal = $flight->flight_data['departure']['terminal'] ?? null;
                                                    $gate = $flight->flight_data['departure']['gate'] ?? null;
                                                @endphp
                                                
                                                @if($terminal)
                                                    <div class="inline-flex items-center gap-1 px-3 py-2 bg-blue-500/20 border border-blue-500/30 rounded-lg">
                                                        <svg class="w-4 h-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                                        </svg>
                                                        <span class="text-sm font-bold text-blue-300">Terminal {{ $terminal }}</span>
                                                    </div>
                                                @endif
                                                
                                                @if($gate)
                                                    <div class="inline-flex items-center gap-1 px-3 py-2 bg-purple-500/20 border border-purple-500/30 rounded-lg">
                                                        <svg class="w-4 h-4 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 11V7a4 4 0 118 0v4m-4 8v2m-6 0h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z"></path>
                                                        </svg>
                                                        <span class="text-sm font-bold text-purple-300">Gate {{ $gate }}</span>
                                                    </div>
                                                @else
                                                    <div class="inline-flex items-center gap-1 px-3 py-2 bg-gray-500/20 border border-gray-500/30 rounded-lg">
                                                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 11V7a4 4 0 118 0v4m-4 8v2m-6 0h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z"></path>
                                                        </svg>
                                                        <span class="text-sm font-bold text-gray-400">Gate TBA</span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Arrival -->
                                    <div class="space-y-3">
                                        <div class="flex items-center gap-2">
                                            <div class="w-3 h-3 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full"></div>
                                            <h4 class="font-bold text-white text-lg">Arrival</h4>
                                        </div>
                                        
                                        <div class="space-y-3 text-sm">
                                            <p class="font-bold text-gray-200">
                                                {{ $flight->flight_data['arrival']['airport'] ?? 'N/A' }}
                                            </p>
                                            <p class="text-2xl font-black text-white">
                                                {{ $flight->flight_data['arrival']['iata'] ?? '--' }}
                                            </p>
                                            
                                            <!-- Display both scheduled and actual/estimated times -->
                                            <div class="space-y-1">
                                                <p class="font-semibold text-gray-400">
                                                    Scheduled: {{ $scheduledArrival ? \Carbon\Carbon::parse($scheduledArrival)->format('D, H:i') : 'N/A' }}
                                                </p>
                                                @if($actualArrival)
                                                    <p class="font-semibold text-green-400">
                                                        Landed: {{ \Carbon\Carbon::parse($actualArrival)->format('D, H:i') }}
                                                    </p>
                                                @elseif($estimatedArrival)
                                                    <p class="font-semibold text-yellow-400">
                                                        Estimated: {{ \Carbon\Carbon::parse($estimatedArrival)->format('D, H:i') }}
                                                    </p>
                                                @elseif($status === 'landed' && !$actualArrival)
                                                    <p class="font-semibold text-orange-400">
                                                        Landed: Time not reported
                                                    </p>
                                                @endif
                                            </div>
                                            
                                            <!-- Real Weather Info -->
                                            <div class="bg-gray-800/50 rounded-xl p-3 border border-gray-700/50">
                                                <div class="flex items-center justify-between">
                                                    <div class="flex items-center gap-2">
                                                        <span class="text-lg">{{ $arrivalWeather['icon'] }}</span>
                                                        <span class="text-xs font-medium text-gray-300 capitalize">{{ $arrivalWeather['condition'] }}</span>
                                                    </div>
                                                    <span class="text-sm font-bold text-white">{{ $arrivalWeather['temp'] }}°C</span>
                                                </div>
                                            </div>
                                            
                                            <!-- Enhanced Terminal & Gate Info -->
                                            <div class="flex flex-wrap gap-2">
                                                @php
                                                    $arrivalTerminal = $flight->flight_data['arrival']['terminal'] ?? null;
                                                    $arrivalGate = $flight->flight_data['arrival']['gate'] ?? null;
                                                    $baggage = $flight->flight_data['arrival']['baggage'] ?? null;
                                                @endphp
                                                
                                                @if($arrivalTerminal)
                                                    <div class="inline-flex items-center gap-1 px-3 py-2 bg-blue-500/20 border border-blue-500/30 rounded-lg">
                                                        <svg class="w-4 h-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                                        </svg>
                                                        <span class="text-sm font-bold text-blue-300">Terminal {{ $arrivalTerminal }}</span>
                                                    </div>
                                                @endif
                                                
                                                @if($arrivalGate)
                                                    <div class="inline-flex items-center gap-1 px-3 py-2 bg-purple-500/20 border border-purple-500/30 rounded-lg">
                                                        <svg class="w-4 h-4 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 11V7a4 4 0 118 0v4m-4 8v2m-6 0h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z"></path>
                                                        </svg>
                                                        <span class="text-sm font-bold text-purple-300">Gate {{ $arrivalGate }}</span>
                                                    </div>
                                                @endif
                                                
                                                @if($baggage)
                                                    <div class="inline-flex items-center gap-1 px-3 py-2 bg-green-500/20 border border-green-500/30 rounded-lg">
                                                        <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                                        </svg>
                                                        <span class="text-sm font-bold text-green-300">Baggage {{ $baggage }}</span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Enhanced Flight Path Visualization -->
                                <div class="relative mb-6">
                                    <div class="flex items-center justify-between">
                                        <div class="w-4 h-4 bg-blue-500 rounded-full shadow-lg relative">
                                            @if($departureWeather['condition'] === 'rain' || str_contains($departureWeather['condition'], 'rain'))
                                                <div class="absolute -top-1 -right-1 w-2 h-2 bg-blue-300 rounded-full animate-ping"></div>
                                            @endif
                                        </div>
                                        <div class="flex-1 h-0.5 bg-gradient-to-r from-blue-500 to-purple-500 mx-4 relative">
                                            <!-- Flight progress indicator -->
                                            @if($status === 'active' && $progress > 0)
                                                <div class="absolute top-1/2 transform -translate-y-1/2 transition-all duration-1000"
                                                    style="left: {{ $progress }}%">
                                                    <div class="w-8 h-8 bg-white rounded-full shadow-lg flex items-center justify-center animate-pulse">
                                                        <svg class="w-4 h-4 text-blue-600 rotate-90" fill="currentColor" viewBox="0 0 24 24">
                                                            <path d="M21 16v-2l-8-5V3.5c0-.83-.67-1.5-1.5-1.5S10 2.67 10 3.5V9l-8 5v2l8-2.5V19l-2 1.5V22l3.5-1 3.5 1v-1.5L13 19v-5.5l8 2.5z"/>
                                                        </svg>
                                                    </div>
                                                </div>
                                            @elseif($status === 'landed')
                                                <div class="absolute top-1/2 right-0 transform -translate-y-1/2">
                                                    <div class="w-8 h-8 bg-gray-400 rounded-full shadow-lg flex items-center justify-center">
                                                        <svg class="w-4 h-4 text-gray-700 rotate-90" fill="currentColor" viewBox="0 0 24 24">
                                                            <path d="M21 16v-2l-8-5V3.5c0-.83-.67-1.5-1.5-1.5S10 2.67 10 3.5V9l-8 5v2l8-2.5V19l-2 1.5V22l3.5-1 3.5 1v-1.5L13 19v-5.5l8 2.5z"/>
                                                        </svg>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                                                    <svg class="w-6 h-6 text-gray-400 rotate-90" fill="currentColor" viewBox="0 0 24 24">
                                                        <path d="M21 16v-2l-8-5V3.5c0-.83-.67-1.5-1.5-1.5S10 2.67 10 3.5V9l-8 5v2l8-2.5V19l-2 1.5V22l3.5-1 3.5 1v-1.5L13 19v-5.5l8 2.5z"/>
                                                    </svg>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="w-4 h-4 bg-purple-500 rounded-full shadow-lg relative">
                                            @if($arrivalWeather['condition'] === 'rain' || str_contains($arrivalWeather['condition'], 'rain'))
                                                <div class="absolute -top-1 -right-1 w-2 h-2 bg-blue-300 rounded-full animate-ping"></div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <!-- Remove Button -->
                                <form action="{{ route('flights.destroy', $flight) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="group/remove w-full bg-gray-800/50 hover:bg-gradient-to-r hover:from-red-500 hover:to-pink-500 text-gray-400 hover:text-white font-semibold py-3 px-4 rounded-2xl transition-all duration-300 hover:scale-105 border border-gray-700/50 hover:border-red-500/50 backdrop-blur-xl"
                                        onclick="return confirm('Remove this flight from tracking?')">
                                        <span class="flex items-center justify-center gap-2">
                                            <svg class="w-5 h-5 transition-transform group-hover/remove:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                            Remove Flight
                                        </span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <!-- Empty state -->
                        <div class="col-span-full">
                            <div class="text-center py-20">
                                <div class="relative inline-block">
                                    <svg class="w-24 h-24 text-gray-600 mx-auto mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9 3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path>
                                        </svg>
                                        <div class="absolute inset-0 bg-blue-500/20 rounded-full blur-2xl"></div>
                                    </div>
                                    <h3 class="text-2xl font-bold text-white mb-4">No flights tracked yet</h3>
                                    <p class="text-gray-400 max-w-sm mx-auto">Add your first flight code above to start tracking flights with our premium real-time system.</p>
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <style>
        @keyframes slide-down {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes tilt {
            0%, 50%, 100% {
                transform: rotate(0deg);
            }
            25% {
                transform: rotate(1deg);
            }
            75% {
                transform: rotate(-1deg);
            }
        }
        
        @keyframes progress-shine {
            0% { transform: translateX(-100%) skewX(-12deg); }
            100% { transform: translateX(200%) skewX(-12deg); }
        }
        
        .animate-slide-down {
            animation: slide-down 0.5s ease-out;
        }
        
        .animate-tilt {
            animation: tilt 10s infinite linear;
        }
        
        .progress-shine {
            animation: progress-shine 2s infinite;
        }
        
        .shadow-3xl {
            box-shadow: 0 35px 60px -12px rgba(0, 0, 0, 0.25);
        }
    </style>

    <script>
        // Add some premium interactions
        document.addEventListener('DOMContentLoaded', function() {
            // Set dark mode by default
            document.documentElement.classList.add('dark');
            
            // Smooth scroll for better UX
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    document.querySelector(this.getAttribute('href')).scrollIntoView({
                        behavior: 'smooth'
                    });
                });
            });

            // Add loading states for better UX
            document.querySelectorAll('form').forEach(form => {
                form.addEventListener('submit', function(e) {
                    const button = this.querySelector('button[type="submit"]');
                    if (button) {
                        button.disabled = true;
                        button.innerHTML = button.innerHTML.replace('Track Flight', 'Tracking...');
                    }
                });
            });
        });
    </script>
    
</x-app-layout>