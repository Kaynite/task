<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
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

Route::get('/', HomeController::class)->name('home');

Route::resource('clients', ClientController::class)->only('index', 'create', 'store');
Route::resource('products', ProductController::class)->only('index', 'create', 'store');
Route::resource('invoices', InvoiceController::class)->only('index', 'create');
