<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ClientController;

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

Route::get('/dashboard', [\App\Http\Controllers\TicketController::class, 'index']
)->middleware(['auth'])->name('dashboard');

Route::get('/all_tickets', [\App\Http\Controllers\TicketController::class, 'show_all']
)->middleware(['auth'])->name('all_tickets');

Route::get('/new_ticket', function () {
    return view('new_ticket');
})->middleware(['auth'])->name('new_ticket');

Route::get('/clients', [\App\Http\Controllers\ClientController::class, 'show_all']
)->middleware(['auth'])->name('clients');

require __DIR__.'/auth.php';
