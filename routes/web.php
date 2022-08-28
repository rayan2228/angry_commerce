<?php

use App\Http\Controllers\AdminProfileController;
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
Route::get('/about', [HomeController::class, 'about_us'])->name('about_us');
Route::get('/contact', [HomeController::class, 'contact_us'])->name('contact_us');
Route::post('/contact', [HomeController::class, 'contact_message'])->name('contact_message');

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
    Route::resource('/adminprofile',AdminProfileController::class);
    Route::get('/category/trash',[CategoryController::class,'trash'])->name("category.trash");
    Route::get('/category/restore/{category}',[CategoryController::class,'restore'])->name("category.restore");
    Route::resource('/category', CategoryController::class);
    Route::get('/brand/trash',[BrandController::class,'trash'])->name("brand.trash");
    Route::get('/brand/restore/{brand}',[BrandController::class,'restore'])->name("brand.restore");
    Route::resource('/brand', BrandController::class);
    Route::resource('/user', UserController::class);
});
require __DIR__ . '/admin_auth.php';
