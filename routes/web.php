<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', function () {
    return view('login');
});

// Route Dashboard & Profile
Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');
Route::get('/profile', [PageController::class, 'profile'])->name('profile');

// Route Pengelolaan
Route::get('/pengelolaan', [PageController::class, 'pengelolaan'])->name('pengelolaan');
