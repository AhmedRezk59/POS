<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Auth::routes(['register' => false ]);
Route::middleware('auth')->prefix(LaravelLocalization::setLocale())->name('dashboard.')->group(function () {


    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('users', UserController::class)->except('show');
    Route::resource('categories', CategoryController::class)->except('show');
    Route::resource('products', ProductController::class)->except('show');
    Route::resource('sizes', SizeController::class)->except('show');
    Route::resource('invoices', InvoiceController::class)->except(['show' , 'update']);
    Route::get('invoice/{id}/pdf', [InvoiceController::class, 'print'])->name('print');
});
