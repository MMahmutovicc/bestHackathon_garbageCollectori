<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\LeaderboardsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ConnectionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

Route::middleware('auth')->group(function () {
    Route::get('/users/{user:slug}', [UserController::class, 'index'])->name('users.index');
    Route::post('/connection/{connection}', [ConnectionController::class, 'store'])->name('connection');
    Route::get('/leaderboards', [LeaderboardsController::class, 'index'])->name('leaderboards.index');   
    Route::post('/logout', [LogoutController::class, 'index'])->name('logout');
    Route::get('/offers/{partner}', [OfferController::class, 'index'])->name('offers.index');
    Route::post('/offers/{offer}', [OfferController::class, 'store'])->name('offers.store');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::post('/admin/toggle/offer/{offer_id}', [AdminController::class, 'toggleOfferStatus'])->name('admin.toggleOfferStatus');
    Route::post('/admin/toggle/referral_code/{refferalCode_id}', [AdminController::class, 'toggleReferralCodeStatus'])->name('admin.toggleReferralCodeStatus');
    Route::post('/admin/add/offer', [AdminController::class, 'addOffer'])->name('admin.addOffer');
    Route::post('/admin/add/partner', [AdminController::class, 'addPartner'])->name('admin.addPartner');
});


