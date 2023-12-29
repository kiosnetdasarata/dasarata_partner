<?php

use App\Http\Controllers\Admin\DashboardAdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Partners\PaymentController;
use App\Http\Controllers\Partners\ProfileController;
use App\Http\Controllers\Partners\CustomerController;
use App\Http\Controllers\Partners\DashboardController;

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
    return view('login');
})->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::middleware(['mitra'])->group(function() {
    Route::prefix('partners')->name('partners.')->group(function() {
        Route::prefix('dashboard')->name('dashboard.')->group(function() {
            Route::controller(DashboardController::class)->group(function () {
                Route::get('/', 'index')->name('index');
            });
        });
        Route::prefix('customers')->name('customers.')->group(function () {
            Route::controller(CustomerController::class)->group(function() {
                Route::get('/', 'index')->name('index');
                Route::post('/print-invoice-batch', 'invoiceBatch')->name('invoiceBatch');
                Route::get('/data-customer', 'dataCustomers')->name('dataCustomers');
                Route::post('/import-data-customer', 'importDataCustomers')->name('importDataCustomers');
                Route::post('/store', 'store')->name('store');
                Route::put('/{id}/update', 'update')->name('update');
                Route::put('/{id}/regist', 'regisCustomer')->name('regisCustomer');
                Route::put('/{id}/isolir', 'isolir')->name('isolir');
                Route::get('/{id}/show', 'show')->name('show');
                Route::get('/{va}/history-paid', 'historyPaid')->name('historyPaid');
                Route::get('/{id}/print-invoice', 'invoice')->name('invoice');
            });
        });
        Route::prefix('payments')->name('payments.')->group(function () {
            Route::controller(PaymentController::class)->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/paid-this-month', 'paidThisMonth')->name('paidThisMonth');
                Route::get('/paid-this-month/export', 'exportPaidThisMonth')->name('exportPaidThisMonth');
                Route::get('/histories-paid', 'historyPaid')->name('historyPaid');
                Route::post('/histories-paid/export', 'exportHistoryPaid')->name('exportHistoryPaid');
                Route::get('/{id}/show', 'show')->name('show');
                Route::get('/{id}/invoice', 'printInvoice')->name('printInvoice');
            });
        });

        Route::prefix('my-profile')->name('my-profile.')->group(function () {
            Route::controller(ProfileController::class)->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/{id}/edit', 'edit')->name('edit');
                Route::put('/{id}', 'update')->name('update');
            });
        });
    });
});

Route::middleware(['admin'])->group(function() {
    Route::prefix('admin')->name('admin.')->group(function() {
        Route::prefix('dashboard')->name('dashboard.')->group(function() {
            Route::controller(DashboardAdminController::class)->group(function () {
                Route::get('/', 'index')->name('index');
            });
        });
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
});


