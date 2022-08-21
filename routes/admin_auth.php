<?php

use App\Http\Controllers\admin_Auth\AuthenticatedSessionController;
use App\Http\Controllers\admin_Auth\NewPasswordController;
use App\Http\Controllers\admin_Auth\PasswordResetLinkController;
use App\Http\Controllers\admin_Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;


Route::group(["prefix"=>"admin","middleware"=>"guest:admin", "as"=>"admin."],function () {
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

Route::group(["prefix"=>"admin","middleware"=>"auth:admin", "as"=>"admin."],function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});
