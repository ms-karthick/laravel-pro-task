<?php

use App\Http\Controllers\SalesController;    
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('sales', SalesController::class);
// Route::post('sales', [SalesController::class, 'index'])->name('sales.index');
// Route::post('sales/store', [SalesController::class, 'store'])->name('sales.store');
Route::get('/sales-common', [ SalesController::class, 'common' ])->name('sales-common');