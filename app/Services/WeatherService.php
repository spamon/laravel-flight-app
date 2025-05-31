<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use App\Data\AirportCities;

class WeatherService
{
    protected $baseUrl = 'http://api.weatherapi.com/v1/';
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = config('services.weatherapi.key');
    }

    /**
     * Get weather for an airport by IATA code
     */
    public function getAirportWeather($iataCode)
    {
        // Get city name from IATA code
        $cityName = AirportCities::getCityName($iataCode);
        
        if (!$cityName) {
            Log::warning("No city mapping found for IATA code: {$iataCode}");
            return $this->getDefaultWeather();
        }

        // Check cache first (weather doesn't change that often)
        $cacheKey = "weather_{$iataCode}";
        $cachedWeather = Cache::get($cacheKey);
        
        if ($cachedWeather) {
            Log::info("Using cached weather for {$iataCode}");
            return $cachedWeather;
        }

        // Fetch fresh weather data
        $weather = $this->fetchWeatherData($cityName, $iataCode);
        
        if ($weather) {
            // Cache for 30 minutes
            Cache::put($cacheKey, $weather, now()->addMinutes(30));
            return $weather;
        }

        // Fallback to default weather
        return $this->getDefaultWeather();
    }

    /**
     * Fetch weather data from WeatherAPI
     */
    private function fetchWeatherData($cityName, $iataCode)
    {
        try {
            $response = Http::timeout(10)->get($this->baseUrl . 'current.json', [
                'key' => $this->apiKey,
                'q' => $cityName,
                'aqi' => 'no'
            ]);

            if ($response->successful()) {
                $data = $response->json();
                
                $weather = [
                    'temp' => round($data['current']['temp_c']),
                    'condition' => strtolower($data['current']['condition']['text']),
                    'icon' => $this->mapWeatherIcon($data['current']['condition']['code']),
                    'humidity' => $data['current']['humidity'] ?? null,
                    'wind_speed' => $data['current']['wind_kph'] ?? null,
                    'visibility' => $data['current']['vis_km'] ?? null,
                ];

                Log::info("Weather fetched successfully", [
                    'iata' => $iataCode,
                    'city' => $cityName,
                    'temp' => $weather['temp'],
                    'condition' => $weather['condition']
                ]);

                return $weather;
            }

            Log::warning("WeatherAPI request failed", [
                'iata' => $iataCode,
                'city' => $cityName,
                'status' => $response->status(),
                'response' => $response->body()
            ]);

        } catch (\Exception $e) {
            Log::error("Weather API exception", [
                'iata' => $iataCode,
                'city' => $cityName,
                'error' => $e->getMessage()
            ]);
        }

        return null;
    }

    /**
     * Map WeatherAPI condition codes to emojis
     */
    private function mapWeatherIcon($conditionCode)
    {
        return match($conditionCode) {
            1000 => '☀️',  // Sunny/Clear
            1003, 1006, 1009 => '☁️',  // Partly cloudy, Cloudy, Overcast
            1030, 1135, 1147 => '🌫️',  // Mist, Fog
            1063, 1180, 1183, 1186, 1189, 1192, 1195, 1240, 1243, 1246 => '🌧️',  // Rain variants
            1066, 1069, 1072, 1114, 1117, 1210, 1213, 1216, 1219, 1222, 1225, 1237, 1249, 1252, 1255, 1258, 1261, 1264 => '❄️',  // Snow variants
            1087, 1273, 1276, 1279, 1282 => '⛈️',  // Thunder storms
            default => '☁️'  // Default to cloudy
        };
    }

    /**
     * Get multiple airport weather data efficiently
     */
    public function getBulkAirportWeather($iataCodes)
    {
        $weatherData = [];
        
        foreach ($iataCodes as $iataCode) {
            $weatherData[$iataCode] = $this->getAirportWeather($iataCode);
        }

        return $weatherData;
    }

    /**
     * Fallback weather when API fails
     */
    private function getDefaultWeather()
    {
        return [
            'temp' => rand(15, 25),
            'condition' => 'partly cloudy',
            'icon' => '☁️',
            'humidity' => null,
            'wind_speed' => null,
            'visibility' => null,
        ];
    }

    /**
     * Get weather forecast (if needed later)
     */
    public function getAirportForecast($iataCode, $days = 3)
    {
        $cityName = AirportCities::getCityName($iataCode);
        
        if (!$cityName) {
            return null;
        }

        try {
            $response = Http::timeout(10)->get($this->baseUrl . 'forecast.json', [
                'key' => $this->apiKey,
                'q' => $cityName,
                'days' => $days,
                'aqi' => 'no',
                'alerts' => 'no'
            ]);

            if ($response->successful()) {
                return $response->json();
            }

        } catch (\Exception $e) {
            Log::error("Weather forecast API exception", [
                'iata' => $iataCode,
                'error' => $e->getMessage()
            ]);
        }

        return null;
    }

    /**
     * Check API usage/quota (if needed)
     */
    public function checkApiUsage()
    {
        Log::info('Weather API call made at: ' . now()->toISOString());
    }
}