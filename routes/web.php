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
Route::get('profile', [ProfileController::class, 'view'])->name('profile');
// Route::post('profile', [ProfileController::class, 'updateProfile']);
// Route::post('profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.change-password');
Route::resource('users', UserController::class)->except('show');

Route::resource('clients', ClientController::class)->only('index', 'create', 'store');
Route::resource('products', ProductController::class)->only('index', 'create', 'store');
Route::resource('invoices', InvoiceController::class)->only('index', 'create', 'store');

require __DIR__ . '/auth.php';
