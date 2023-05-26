<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/add-product', [HomeController::class, 'create'])->name('products.create');
Route::post('/save-product', [HomeController::class, 'store'])->name('products.store');
Route::get('/delete-product', [HomeController::class, 'delete'])->name('products.delete');
Route::get('/generate-invoice', [HomeController::class, 'generateInvoice'])->name('products.generate-invoice');

