<?php

use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\RentalController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\CarController as FrontendCarController;
use App\Http\Controllers\Frontend\RentalController as FrontendRentalController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Frontend Public Routes
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');


// Car Browsing (Public)
Route::get('/cars', [FrontendCarController::class, 'index'])->name('frontend.cars.index');
Route::get('/cars/{car}', [FrontendCarController::class, 'show'])->name('frontend.cars.show');



// Authentication Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// Admin Routes
Route::middleware(['auth', 'AdminMiddleware'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::resource('cars', CarController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('rentals', RentalController::class);
});

// Customer Routes
Route::middleware(['auth', 'CustomerMiddleware'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'CustomerDashboard'])->name('dashboard');
    
    // Rental Management
    Route::get('/rentals', [FrontendRentalController::class, 'index'])->name('frontend.rentals.index');
    Route::get('/rentals/create/{car}', [FrontendRentalController::class, 'create'])->name('frontend.rentals.create');
    Route::post('/rentals', [FrontendRentalController::class, 'store'])->name('frontend.rentals.store');
    Route::post('/rentals/{rental}/cancel', [FrontendRentalController::class, 'cancel'])->name('frontend.rentals.cancel');
});