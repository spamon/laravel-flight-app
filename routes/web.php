<?php

use App\Http\Controllers\FlightController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

// Homepage - redirect logged-in users to flights, show homepage to guests
Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('flights.index');
    }
    return view('home');
})->name('home');

// Dashboard redirect to flights (in case anything still links to /dashboard)
Route::get('/dashboard', function () {
    return redirect()->route('flights.index');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Flight tracking routes with auto-refresh functionality
Route::middleware('auth')->group(function () {
    // Main flight routes
    Route::get('/flights', [FlightController::class, 'index'])->name('flights.index');
    Route::post('/flights', [FlightController::class, 'store'])->name('flights.store');
    Route::delete('/flights/{flight}', [FlightController::class, 'destroy'])->name('flights.destroy');
    
    // Auto-refresh routes for real-time updates
    Route::post('/flights/{flight}/refresh', [FlightController::class, 'refresh'])->name('flights.refresh');
    Route::post('/flights/refresh-all', [FlightController::class, 'refreshAll'])->name('flights.refreshAll');
});



require __DIR__.'/auth.php';