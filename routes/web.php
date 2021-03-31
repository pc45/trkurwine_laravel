<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/states', function () {
    return view('states');
})->name('states');

Route::get('/users', function () {
    return view('users');
})->name('users');

Route::group(['middleware' => ['auth']], function() {
    //Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    //Route::resource('products', ProductController::class);
});

require __DIR__.'/auth.php';
