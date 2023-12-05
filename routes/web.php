<?php

use App\Http\Controllers\Partners\CustomerController;
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

Route::get('/', function () {
    return view('partners.index');
});


Route::prefix('customers')->name('customers.')->group(function () {
    Route::controller(CustomerController::class)->group(function() {
        Route::get('/', 'index')->name('index');
        Route::post('/store', 'store')->name('store');
        Route::get('/{id}.edit', 'edit')->name('edit');
        Route::put('/{id}/update', 'update')->name('update');
        Route::get('/{id}/show', 'show')->name('show');
    });
});
