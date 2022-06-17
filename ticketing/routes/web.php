<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/tickets', function () {
    return view('tickets');
})->middleware(['dashboard'])->name('tickets');

Route::get('/new_ticket', function () {
    return view('new_ticket');
})->middleware(['dashboard'])->name('new_ticket');

Route::get('/clients', function () {
    return view('clients');
})->middleware(['dashboard'])->name('clients');

require __DIR__.'/auth.php';
