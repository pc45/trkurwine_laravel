<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExcelController;

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
    return view('users.index');
})->name('users');

Route::get('/shippers', function () {
   return view('shippers.index');
})->name('shippers');

Route::view('/shippers/search','shippers.index');

Route::group(['middleware' => ['auth']], function() {
    //Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    //Route::resource('products', ProductController::class);
});

// Route for view/blade file.
Route::get('importExportView', [ExcelController::class, 'importExportView'])->name('importExportView');
// Route for export/download tabledata to .csv, .xls or .xlsx
Route::get('exportExcel/{type}', [ExcelController::class, 'exportExcel'])->name('exportExcel');
// Route for import excel data to database.
Route::post('importExcel', [ExcelController::class, 'importExcel'])->name('importExcel');

require __DIR__.'/auth.php';
