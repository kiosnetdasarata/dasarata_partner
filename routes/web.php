<?php

use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Partners\CustomerController;
use App\Http\Controllers\partners\PaymentController;
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

Route::prefix('partners')->name('partners.')->group(function() {
    Route::prefix('customers')->name('customers.')->group(function () {
        Route::controller(CustomerController::class)->group(function() {
            Route::get('/', 'index')->name('index');
            Route::get('/data-customer', 'dataCustomers')->name('dataCustomers');
            Route::post('/store', 'store')->name('store');
            Route::put('/{id}/update', 'update')->name('update');
            Route::put('/{id}/regist', 'regisCustomer')->name('regisCustomer');
            Route::get('/{id}/show', 'show')->name('show');
        });
    });
    Route::prefix('payments')->name('payments.')->group(function () {
        Route::controller(PaymentController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/histories-paid', 'historyPaid')->name('historyPaid');
            Route::get('/{id}/show', 'show')->name('show');
        });
    });
});

Route::prefix('admin')->name('admin.')->group(function() {
    Route::prefix('partners')->name('partners.')->group(function() {
        Route::controller(PartnerController::class)->group(function() {
            Route::get('/', 'index')->name('index');
            Route::post('/store', 'store')->name('store');
            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}/update', 'update')->name('update');
            Route::get('/{id}/show', 'show')->name('show');
        });
    });
});


