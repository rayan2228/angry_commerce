<?php

use App\Http\Controllers\Vendor\AuthenticatedSessionController;
use App\Http\Controllers\Vendor\NewPasswordController;
use App\Http\Controllers\Vendor\PasswordResetLinkController;
use Illuminate\Support\Facades\Route;


Route::group(["prefix" => "vendor", "middleware" => "guest:vendor", "as" => "vendor."], function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store'])->name('register');
    
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.update');
});

Route::group(["prefix" => "vendor", "middleware" => "auth:vendor", "as" => "vendor."], function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
