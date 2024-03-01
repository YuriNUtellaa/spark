<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SlotsController;


// FOR WEBSITE INTERFACE ////////////////////////////////////

    Route::get('/', [SlotsController::class, 'index'])->name('/');
    Route::get('/home', [SlotsController::class, 'index'])->name('home'); // Use SlotsController for the root and home routes
    Route::get('/slots', [SlotsController::class, 'slot'])->name('slots');

// FOR ADMIN INTERFACE ////////////////////////////////////

    Route::get('/register-admin', [AdminController::class, 'showRegistrationForm'])->name('register-admin');
    Route::post('/register-admin', [AdminController::class, 'register']);

    Route::get('/login-admin', [AdminController::class, 'showLoginForm'])->name('login-admin');
    Route::post('/login-admin', [AdminController::class, 'login']);

    Route::get('/slots-control-admin', [AdminController::class, 'showAdminSlot'])->name('slots-control-admin');
    Route::post('/logout-admin', [AdminController::class, 'logout'])->name('logout-admin');

    // RENTING AN IRREGULAR USER

        Route::post('/confirm-rent-admin', [SlotsController::class, 'confirmRentAdmin'])->name('confirm-rent-admin');

// FOR USER INTERFACE ////////////////////////////////////

    Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [UserController::class, 'register']);

    Route::get('/login', [UserController::class, 'showLoginPage'])->name('login');
    Route::post('/login', [UserController::class, 'login']);

    Route::post('/logout', [UserController::class, 'logout'])->name('logout');

    // RENT 

        Route::get('/rent/{slot}', [SlotsController::class, 'showRentForm'])->name('rent');
        Route::post('/confirm-rent', [SlotsController::class, 'confirmRent'])->name('confirm-rent');

    