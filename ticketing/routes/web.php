<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StatusController;

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

Route::get('/dashboard', [\App\Http\Controllers\TicketController::class, 'show_active']
)->middleware(['auth'])->name('dashboard');

Route::get('/all_tickets', [\App\Http\Controllers\TicketController::class, 'show_all']
)->middleware(['auth'])->name('all_tickets');

Route::get('/new_ticket', [TicketController::class, 'index']
)->middleware(['auth'])->name('new_ticket');

Route::get('/all_clients', [\App\Http\Controllers\ClientController::class, 'show_all']
)->middleware(['auth'])->name('all_clients');

Route::post('/new_ticket', [TicketController::class, 'store']);

Route::get('/all_tickets/{ticket}', [TicketController::class, 'show']
)->middleware(['auth'])->name('ticket');

Route::get('/dashboard/{ticket}', [TicketController::class, 'show']
)->middleware(['auth'])->name('ticket');

Route::get('/all_clients/{client}', [ClientController::class, 'show']
)->middleware(['auth'])->name('client');

Route::get('/all_tickets/{edit_ticket}', [TicketController::class, 'update']
)->middleware(['auth'])->name('edit_ticket');

Route::get('/all_clients/{edit_client}', [TicketController::class, 'update']
)->middleware(['auth'])->name('edit_client');

require __DIR__.'/auth.php';
