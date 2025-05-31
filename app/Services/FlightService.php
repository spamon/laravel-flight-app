<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class FlightService
{
    protected $baseUrl;
    protected $apiKey;

    public function __construct()
    {
        $this->baseUrl = config('services.aviationstack.base_url', 'https://api.aviationstack.com/v1/');
        $this->apiKey = config('services.aviationstack.key');
        
        if (!$this->apiKey) {
            Log::error('Aviationstack API key not configured');
            throw new \Exception('Aviationstack API key not configured. Please add AVIATIONSTACK_API_KEY to your .env file');
        }
    }

    public function fetchFlight($flightCode)
    {
        // Validate flight code first
        $validation = $this->validateFlightCode($flightCode);
        if (!$validation['valid']) {
            Log::error('Invalid flight code format', ['flight_code' => $flightCode]);
            return null;
        }

        // STEP 1: Try to get current/active flight first
        $currentFlight = $this->fetchCurrentFlight($flightCode);
        if ($currentFlight) {
            return $currentFlight;
        }

        // STEP 2: If no current flight, search recent dates (last 3 days)
        for ($i = 0; $i <= 3; $i++) {
            $date = Carbon::now()->subDays($i)->format('Y-m-d');
            $historicalFlight = $this->fetchFlightByDate($flightCode, $date);
            
            if ($historicalFlight) {
                Log::info("Found flight on date: {$date}", [
                    'flight_code' => $flightCode,
                    'status' => $historicalFlight['flight_status'] ?? 'unknown'
                ]);
                return $historicalFlight;
            }
        }

        Log::warning("No flight data found for {$flightCode} in last 3 days");
        return null;
    }

    /**
     * ENHANCED: Get fresh flight data for existing tracked flights
     */
    public function refreshFlightData($flightCode, $originalFlightDate = null)
    {
        Log::info("Refreshing flight data for {$flightCode}");

        // If we know the original flight date, try that first
        if ($originalFlightDate) {
            $flight = $this->fetchFlightByDate($flightCode, $originalFlightDate);
            if ($flight) {
                Log::info("Refreshed flight data from original date: {$originalFlightDate}");
                return $flight;
            }
        }

        // Otherwise use normal fetch logic
        return $this->fetchFlight($flightCode);
    }

    /**
     * Get current/active flights (today's flights)
     */
    private function fetchCurrentFlight($flightCode)
    {
        $response = $this->makeApiCall('flights', [
            'access_key' => $this->apiKey,
            'flight_iata' => $flightCode,
            'limit' => 5,  // Get multiple recent results
            'offset' => 0
        ]);

        if ($response->successful()) {
            $data = $response->json();
            
            Log::info('Current flight search', [
                'flight_code' => $flightCode,
                'total_results' => count($data['data'] ?? []),
                'api_call_time' => now()->toISOString()
            ]);

            // Return the most recent flight
            if (!empty($data['data'])) {
                return $this->transformFlightData($data['data'][0]);
            }
        }

        Log::error('Current flight API Error', [
            'flight_code' => $flightCode,
            'status' => $response->status(),
            'response_body' => $response->body()
        ]);

        return null;
    }

    /**
     * Get flight by specific date (for historical data with actual times)
     */
    private function fetchFlightByDate($flightCode, $date)
    {
        $response = $this->makeApiCall('flights', [
            'access_key' => $this->apiKey,
            'flight_iata' => $flightCode,
            'flight_date' => $date,
            'limit' => 10
        ]);

        if ($response->successful()) {
            $data = $response->json();
            
            Log::info("Historical flight search for date {$date}", [
                'flight_code' => $flightCode,
                'total_results' => count($data['data'] ?? []),
                'api_call_time' => now()->toISOString()
            ]);
            
            // Return the most recent result for this date
            if (!empty($data['data'])) {
                return $this->transformFlightData($data['data'][0]);
            }
        }

        return null;
    }

    /**
     * Transform raw Aviationstack data to consistent format
     */
    public function transformFlightData($rawData)
    {
        if (!$rawData) return null;

        return [
            'flight_status' => $rawData['flight_status'] ?? 'unknown',
            'flight_date' => $rawData['flight_date'] ?? null,
            
            'departure' => [
                'airport' => $rawData['departure']['airport'] ?? 'Unknown Airport',
                'iata' => $rawData['departure']['iata'] ?? null,
                'icao' => $rawData['departure']['icao'] ?? null,
                'terminal' => $rawData['departure']['terminal'] ?? null,
                'gate' => $rawData['departure']['gate'] ?? null,
                'delay' => $rawData['departure']['delay'] ?? null,
                'scheduled' => $rawData['departure']['scheduled'] ?? null,
                'estimated' => $rawData['departure']['estimated'] ?? null,
                'actual' => $rawData['departure']['actual'] ?? null,
                'estimated_runway' => $rawData['departure']['estimated_runway'] ?? null,
                'actual_runway' => $rawData['departure']['actual_runway'] ?? null,
                'timezone' => $rawData['departure']['timezone'] ?? 'UTC',
            ],
            
            'arrival' => [
                'airport' => $rawData['arrival']['airport'] ?? 'Unknown Airport',
                'iata' => $rawData['arrival']['iata'] ?? null,
                'icao' => $rawData['arrival']['icao'] ?? null,
                'terminal' => $rawData['arrival']['terminal'] ?? null,
                'gate' => $rawData['arrival']['gate'] ?? null,
                'baggage' => $rawData['arrival']['baggage'] ?? null,
                'delay' => $rawData['arrival']['delay'] ?? null,
                'scheduled' => $rawData['arrival']['scheduled'] ?? null,
                'estimated' => $rawData['arrival']['estimated'] ?? null,
                'actual' => $rawData['arrival']['actual'] ?? null,
                'estimated_runway' => $rawData['arrival']['estimated_runway'] ?? null,
                'actual_runway' => $rawData['arrival']['actual_runway'] ?? null,
                'timezone' => $rawData['arrival']['timezone'] ?? 'UTC',
            ],
            
            'airline' => [
                'name' => $rawData['airline']['name'] ?? 'Unknown Airline',
                'iata' => $rawData['airline']['iata'] ?? null,
                'icao' => $rawData['airline']['icao'] ?? null,
            ],
            
            'flight' => [
                'number' => $rawData['flight']['number'] ?? null,
                'iata' => $rawData['flight']['iata'] ?? null,
                'icao' => $rawData['flight']['icao'] ?? null,
                'codeshared' => $rawData['flight']['codeshared'] ?? null,
            ],
            
            'aircraft' => [
                'registration' => $rawData['aircraft']['registration'] ?? null,
                'iata' => $rawData['aircraft']['iata'] ?? null,
                'icao' => $rawData['aircraft']['icao'] ?? null,
                'icao24' => $rawData['aircraft']['icao24'] ?? null,
            ],
            
            // 🚀 REAL-TIME POSITION DATA (Aviationstack's key advantage)
            'live' => $rawData['live'] ? [
                'updated' => $rawData['live']['updated'] ?? null,
                'latitude' => $rawData['live']['latitude'] ?? null,
                'longitude' => $rawData['live']['longitude'] ?? null,
                'altitude' => $rawData['live']['altitude'] ?? null,
                'direction' => $rawData['live']['direction'] ?? null,
                'speed_horizontal' => $rawData['live']['speed_horizontal'] ?? null,
                'speed_vertical' => $rawData['live']['speed_vertical'] ?? null,
                'is_ground' => $rawData['live']['is_ground'] ?? false,
            ] : null,
        ];
    }

    /**
     * Validate flight code format
     */
    public function validateFlightCode($flightCode)
    {
        // Validate flight code format (2-3 letter airline + 1-4 digit number + optional letter)
        if (!preg_match('/^[A-Z]{2,3}\d{1,4}[A-Z]?$/', $flightCode)) {
            return [
                'valid' => false,
                'error' => 'Invalid flight code format. Use format like QR32, BA256, AA1234, etc.'
            ];
        }

        return ['valid' => true];
    }

    /**
     * Make API call with rate limiting protection
     */
    protected function makeApiCall($endpoint, $params)
    {
        // Add rate limiting protection
        static $lastCallTime = 0;
        $minInterval = 1; // Minimum 1 second between calls
        
        $timeSinceLastCall = microtime(true) - $lastCallTime;
        if ($timeSinceLastCall < $minInterval) {
            usleep(($minInterval - $timeSinceLastCall) * 1000000);
        }
        
        $url = $this->baseUrl . $endpoint;
        
        Log::info('Making Aviationstack API call', [
            'endpoint' => $endpoint,
            'params' => array_merge($params, ['access_key' => '[HIDDEN]']), // Hide API key in logs
            'url' => $url
        ]);
        
        $response = Http::timeout(15)->get($url, $params);
        $lastCallTime = microtime(true);
        
        // Log API usage for monitoring
        $this->logApiUsage($response);
        
        return $response;
    }

    /**
     * Check if flight data needs refreshing (every 5-10 minutes for active flights)
     */
    public function shouldRefreshFlight($flight)
    {
        $lastUpdated = $flight->updated_at;
        $flightStatus = $flight->flight_data['flight_status'] ?? 'unknown';
        
        // Different refresh intervals based on flight status
        $refreshInterval = match($flightStatus) {
            'active' => 5,      // Every 5 minutes for active flights
            'scheduled' => 10,   // Every 10 minutes for scheduled flights  
            'landed' => 60,     // Every hour for landed flights
            'cancelled' => 120, // Every 2 hours for cancelled flights
            default => 15       // Every 15 minutes for unknown status
        };

        $shouldRefresh = $lastUpdated->addMinutes($refreshInterval)->isPast();
        
        Log::info("Should refresh check", [
            'flight_code' => $flight->flight_code,
            'status' => $flightStatus,
            'last_updated' => $lastUpdated->toISOString(),
            'refresh_interval' => $refreshInterval,
            'should_refresh' => $shouldRefresh
        ]);

        return $shouldRefresh;
    }

    /**
     * Bulk refresh multiple flights efficiently
     */
    public function refreshMultipleFlights($flights)
    {
        $refreshedFlights = [];
        
        foreach ($flights as $flight) {
            if ($this->shouldRefreshFlight($flight)) {
                $originalDate = null;
                
                // Extract original flight date if available
                if (isset($flight->flight_data['flight_date'])) {
                    $originalDate = $flight->flight_data['flight_date'];
                }

                $freshData = $this->refreshFlightData($flight->flight_code, $originalDate);
                
                if ($freshData) {
                    $flight->update([
                        'flight_data' => $freshData,
                        'updated_at' => now()
                    ]);
                    
                    $refreshedFlights[] = $flight->flight_code;
                    
                    Log::info("Successfully refreshed flight", [
                        'flight_code' => $flight->flight_code,
                        'new_status' => $freshData['flight_status'] ?? 'unknown'
                    ]);
                } else {
                    Log::warning("Failed to refresh flight data", [
                        'flight_code' => $flight->flight_code
                    ]);
                }
                
                // Add small delay to avoid rate limiting
                usleep(500000); // 0.5 second delay
            }
        }

        Log::info("Bulk refresh completed", [
            'total_flights' => count($flights),
            'refreshed_flights' => $refreshedFlights,
            'refresh_count' => count($refreshedFlights)
        ]);

        return $refreshedFlights;
    }

    /**
     * Force refresh a specific flight (manual refresh)
     */
    public function forceRefreshFlight($flight)
    {
        Log::info("Force refreshing flight: {$flight->flight_code}");

        $originalDate = $flight->flight_data['flight_date'] ?? null;
        $freshData = $this->refreshFlightData($flight->flight_code, $originalDate);
        
        if ($freshData) {
            $oldStatus = $flight->flight_data['flight_status'] ?? 'unknown';
            
            $flight->update([
                'flight_data' => $freshData,
                'updated_at' => now()
            ]);
            
            Log::info("Force refresh successful", [
                'flight_code' => $flight->flight_code,
                'old_status' => $oldStatus,
                'new_status' => $freshData['flight_status'] ?? 'unknown'
            ]);
            
            return true;
        }

        Log::error("Force refresh failed for {$flight->flight_code}");
        return false;
    }

    /**
     * Get flight history for completed flights (last 7 days)
     */
    public function getFlightHistory($flightCode, $days = 7)
    {
        $flights = [];
        
        for ($i = 0; $i < $days; $i++) {
            $date = Carbon::now()->subDays($i)->format('Y-m-d');
            $flight = $this->fetchFlightByDate($flightCode, $date);
            
            if ($flight) {
                $flights[] = $flight;
            }
        }

        return $flights;
    }

    /**
     * Get airport information
     */
    public function getAirportInfo($airportCode)
    {
        $response = $this->makeApiCall('airports', [
            'access_key' => $this->apiKey,
            'search' => $airportCode,
        ]);

        if ($response->successful()) {
            $data = $response->json();
            return $data['data'][0] ?? null;
        }

        return null;
    }

    /**
     * Get airline information
     */
    public function getAirlineInfo($airlineCode)
    {
        $response = $this->makeApiCall('airlines', [
            'access_key' => $this->apiKey,
            'search' => $airlineCode,
        ]);

        if ($response->successful()) {
            $data = $response->json();
            return $data['data'][0] ?? null;
        }

        return null;
    }

    /**
     * Debug method to check what data we're actually getting
     */
    public function debugFlight($flightCode, $date = null)
    {
        $date = $date ?? Carbon::today()->format('Y-m-d');
        
        $response = $this->makeApiCall('flights', [
            'access_key' => $this->apiKey,
            'flight_iata' => $flightCode,
            'flight_date' => $date,
            'limit' => 5
        ]);

        if ($response->successful()) {
            $data = $response->json();
            
            Log::info("DEBUG: Full API response for {$flightCode} on {$date}", [
                'response' => $data
            ]);
            
            return $data;
        }

        return null;
    }

    /**
     * Log API usage for monitoring
     */
    protected function logApiUsage($response)
    {
        $headers = $response->headers();
        
        Log::info('Aviationstack API Usage', [
            'timestamp' => now()->toISOString(),
            'status_code' => $response->status(),
            'response_time' => $response->transferStats?->getTransferTime() ?? 'unknown',
            'rate_limit_remaining' => $headers['X-RateLimit-Remaining'][0] ?? 'unknown',
            'rate_limit_limit' => $headers['X-RateLimit-Limit'][0] ?? 'unknown',
        ]);
    }

    /**
     * Check API key validity
     */
    public function testApiConnection()
    {
        try {
            $response = $this->makeApiCall('flights', [
                'access_key' => $this->apiKey,
                'limit' => 1
            ]);

            if ($response->successful()) {
                Log::info('Aviationstack API connection successful');
                return true;
            } else {
                Log::error('Aviationstack API connection failed', [
                    'status' => $response->status(),
                    'response' => $response->body()
                ]);
                return false;
            }
        } catch (\Exception $e) {
            Log::error('Aviationstack API connection error', [
                'error' => $e->getMessage()
            ]);
            return false;
        }
    }

    /**
     * Get API usage statistics (if available)
     */
    public function getApiUsageStats()
    {
        // This would require additional API calls or tracking
        // For now, just return basic info
        return [
            'api_key_configured' => !empty($this->apiKey),
            'base_url' => $this->baseUrl,
            'last_call_time' => now()->toISOString(),
        ];
    }
}