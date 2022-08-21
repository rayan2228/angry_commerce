<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'home'])->name('home');

// customer routes
Route::get('/dashboard', function () {
    return view('customer.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';


// admin routes
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin', 'as' => 'admin.'], function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    Route::resource('/user',UserController::class);
    Route::resource('/profile', ProfileController::class);
    Route::resource('/category', CategoryController::class);
    Route::resource('/brand', BrandController::class);
});

require __DIR__ . '/admin_auth.php';
