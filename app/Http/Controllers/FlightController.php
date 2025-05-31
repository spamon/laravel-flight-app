<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flight;
use App\Services\FlightService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class FlightController extends Controller
{
    protected $flightService;

    public function __construct(FlightService $flightService)
    {
        $this->flightService = $flightService;
    }

    public function index()
    {
        // Get user's flights
        $flights = Auth::user()->flights()->latest()->get();
        
        // AUTO-REFRESH: Update stale flight data automatically
        if ($flights->isNotEmpty()) {
            $refreshedFlights = $this->flightService->refreshMultipleFlights($flights);
            
            if (!empty($refreshedFlights)) {
                Log::info("Auto-refreshed flights on page load", [
                    'user_id' => Auth::id(),
                    'refreshed_flights' => $refreshedFlights
                ]);
                
                // Reload flights after refresh to show updated data
                $flights = Auth::user()->flights()->latest()->get();
            }
        }
        
        return view('flights.index', compact('flights'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'flight_code' => 'required|string|max:10',
        ]);

        $flightCode = strtoupper(trim($request->flight_code));

        // 🎯 VALIDATE FLIGHT CODE FORMAT FIRST
        $validation = $this->flightService->validateFlightCode($flightCode);
        
        if (!$validation['valid']) {
            return redirect()->back()->with('error', $validation['error']);
        }

        // Check if user already tracks this flight
        $existingFlight = Auth::user()->flights()
            ->where('flight_code', $flightCode)
            ->first();

        if ($existingFlight) {
            // Force refresh the existing flight instead of creating duplicate
            if ($this->flightService->forceRefreshFlight($existingFlight)) {
                return redirect()->back()->with('success', "Flight {$flightCode} updated with latest data.");
            } else {
                return redirect()->back()->with('error', "Could not update flight {$flightCode}. Please try again.");
            }
        }

        // Fetch fresh flight data
        try {
            $flightData = $this->flightService->fetchFlight($flightCode);

            if (!$flightData) {
                return redirect()->back()->with('error', "Flight {$flightCode} not found. Please check the flight code and try again.");
            }

            // 🎯 CREATE NEW FLIGHT TRACKING WITH PROPER DATA STRUCTURE
            Auth::user()->flights()->create([
                'flight_code' => $flightCode,
                'flight_data' => $flightData,
            ]);

            Log::info("New flight added", [
                'user_id' => Auth::id(),
                'flight_code' => $flightCode,
                'status' => $flightData['flight_status'] ?? 'unknown',
                'departure' => $flightData['departure']['iata'] ?? 'unknown',
                'arrival' => $flightData['arrival']['iata'] ?? 'unknown'
            ]);

            return redirect()->back()->with('success', "Flight {$flightCode} added successfully.");

        } catch (\Exception $e) {
            Log::error("Error adding flight", [
                'user_id' => Auth::id(),
                'flight_code' => $flightCode,
                'error' => $e->getMessage()
            ]);

            return redirect()->back()->with('error', "Error adding flight {$flightCode}. Please try again.");
        }
    }

    public function destroy(Flight $flight)
    {
        // Security check
        if ($flight->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        $flightCode = $flight->flight_code;
        $flight->delete();

        Log::info("Flight removed", [
            'user_id' => Auth::id(),
            'flight_code' => $flightCode
        ]);

        return redirect()->back()->with('success', "Flight {$flightCode} removed successfully.");
    }

    /**
     * Manual refresh endpoint for AJAX calls
     */
    public function refresh(Flight $flight)
    {
        // Security check
        if ($flight->user_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        try {
            if ($this->flightService->forceRefreshFlight($flight)) {
                // Get the fresh data
                $freshFlight = $flight->fresh();
                
                return response()->json([
                    'success' => true,
                    'message' => 'Flight data refreshed successfully',
                    'flight_data' => $freshFlight->flight_data,
                    'updated_at' => $freshFlight->updated_at->toISOString()
                ]);
            }

            return response()->json([
                'success' => false,
                'message' => 'Failed to refresh flight data'
            ], 500);

        } catch (\Exception $e) {
            Log::error("Error refreshing flight", [
                'flight_id' => $flight->id,
                'flight_code' => $flight->flight_code,
                'error' => $e->getMessage()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Error refreshing flight data'
            ], 500);
        }
    }

    /**
     * Refresh all flights for a user
     */
    public function refreshAll()
    {
        try {
            $flights = Auth::user()->flights;
            $refreshedFlights = $this->flightService->refreshMultipleFlights($flights);

            Log::info("Bulk refresh completed", [
                'user_id' => Auth::id(),
                'total_flights' => $flights->count(),
                'refreshed_count' => count($refreshedFlights)
            ]);

            return redirect()->back()->with('success', 
                count($refreshedFlights) > 0 
                    ? 'Refreshed ' . count($refreshedFlights) . ' flight(s) successfully.'
                    : 'All flights are already up to date.'
            );

        } catch (\Exception $e) {
            Log::error("Error in bulk refresh", [
                'user_id' => Auth::id(),
                'error' => $e->getMessage()
            ]);

            return redirect()->back()->with('error', 'Error refreshing flights. Please try again.');
        }
    }

    /**
     * 🎯 NEW: Get flight details for debugging/admin
     */
    public function show(Flight $flight)
    {
        // Security check
        if ($flight->user_id !== Auth::id()) {
            abort(403);
        }

        return response()->json([
            'flight' => $flight,
            'flight_data' => $flight->flight_data,
            'last_updated' => $flight->updated_at->toISOString(),
            'should_refresh' => $this->flightService->shouldRefreshFlight($flight)
        ]);
    }

    /**
     * 🎯 NEW: Test API connection
     */
    public function testApi()
    {
        try {
            $isConnected = $this->flightService->testApiConnection();
            $usageStats = $this->flightService->getApiUsageStats();

            return response()->json([
                'api_connected' => $isConnected,
                'usage_stats' => $usageStats,
                'timestamp' => now()->toISOString()
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'api_connected' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * 🎯 NEW: Debug flight data
     */
    public function debugFlight(Request $request)
    {
        $request->validate([
            'flight_code' => 'required|string|max:10',
            'date' => 'nullable|date_format:Y-m-d'
        ]);

        $flightCode = strtoupper($request->flight_code);
        $date = $request->date;

        try {
            $debugData = $this->flightService->debugFlight($flightCode, $date);
            
            return response()->json([
                'flight_code' => $flightCode,
                'date' => $date,
                'debug_data' => $debugData,
                'timestamp' => now()->toISOString()
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * 🎯 NEW: Force refresh all user flights (admin action)
     */
    public function forceRefreshAll()
    {
        try {
            $flights = Auth::user()->flights;
            $refreshedCount = 0;

            foreach ($flights as $flight) {
                if ($this->flightService->forceRefreshFlight($flight)) {
                    $refreshedCount++;
                }
                // Small delay to avoid rate limiting
                usleep(500000); // 0.5 seconds
            }

            Log::info("Force refresh all completed", [
                'user_id' => Auth::id(),
                'total_flights' => $flights->count(),
                'force_refreshed_count' => $refreshedCount
            ]);

            return redirect()->back()->with('success', 
                "Force refreshed {$refreshedCount} out of {$flights->count()} flights."
            );

        } catch (\Exception $e) {
            Log::error("Error in force refresh all", [
                'user_id' => Auth::id(),
                'error' => $e->getMessage()
            ]);

            return redirect()->back()->with('error', 'Error force refreshing flights. Please try again.');
        }
    }

    /**
     * 🎯 NEW: Get flight history
     */
    public function history(Request $request)
    {
        $request->validate([
            'flight_code' => 'required|string|max:10',
            'days' => 'nullable|integer|min:1|max:30'
        ]);

        $flightCode = strtoupper($request->flight_code);
        $days = $request->days ?? 7;

        try {
            $history = $this->flightService->getFlightHistory($flightCode, $days);
            
            return response()->json([
                'flight_code' => $flightCode,
                'days_searched' => $days,
                'flights_found' => count($history),
                'history' => $history,
                'timestamp' => now()->toISOString()
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * 🎯 NEW: Get airport information
     */
    public function airportInfo(Request $request)
    {
        $request->validate([
            'airport_code' => 'required|string|max:4'
        ]);

        $airportCode = strtoupper($request->airport_code);

        try {
            $airportInfo = $this->flightService->getAirportInfo($airportCode);
            
            return response()->json([
                'airport_code' => $airportCode,
                'airport_info' => $airportInfo,
                'timestamp' => now()->toISOString()
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * 🎯 NEW: Bulk operations
     */
    public function bulkDelete(Request $request)
    {
        $request->validate([
            'flight_ids' => 'required|array',
            'flight_ids.*' => 'integer|exists:flights,id'
        ]);

        try {
            $flights = Auth::user()->flights()
                ->whereIn('id', $request->flight_ids)
                ->get();

            $deletedCount = $flights->count();
            $flightCodes = $flights->pluck('flight_code')->toArray();

            foreach ($flights as $flight) {
                $flight->delete();
            }

            Log::info("Bulk delete completed", [
                'user_id' => Auth::id(),
                'deleted_flights' => $flightCodes,
                'deleted_count' => $deletedCount
            ]);

            return redirect()->back()->with('success', 
                "Deleted {$deletedCount} flight(s) successfully."
            );

        } catch (\Exception $e) {
            Log::error("Error in bulk delete", [
                'user_id' => Auth::id(),
                'error' => $e->getMessage()
            ]);

            return redirect()->back()->with('error', 'Error deleting flights. Please try again.');
        }
    }
}