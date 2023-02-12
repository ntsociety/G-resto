<?php

use App\Http\Controllers\API\SocialAuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/login-google', [SocialAuthController::class, 'redirectToProvider'])->name('google.login');
Route::get('/auht/google/callback', [SocialAuthController::class, 'handleCallback'])->name('google.login.callback');
