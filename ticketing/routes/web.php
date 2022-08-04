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


//Show and View Tickets
Route::get('/dashboard', [TicketController::class, 'show_active'])
    ->middleware(['auth'])->name('dashboard');

Route::get('/all_tickets', [TicketController::class, 'show_all'])
    ->middleware(['auth'])->name('all_tickets');

Route::get('/tickets/{ticket}', [TicketController::class, 'show'])
    ->middleware(['auth'])->name('ticket');


//New Ticket
Route::get('/new_ticket', [TicketController::class, 'index'])
    ->middleware(['auth'])->name('new_ticket');

Route::post('/new_ticket', [TicketController::class, 'store']);


//Edit Ticket
Route::get('/tickets/{ticket}/edit', [TicketController::class, 'edit'])
    ->middleware(['auth'])
    ->name('edit_ticket');

Route::patch('/tickets/{ticket}', [TicketController::class, 'update']);


//Delete Ticket
Route::delete('/tickets/{ticket}', [TicketController::class, 'destroy'])->name('delete_ticket');



//CLIENTS
//Show & View Clients
Route::get('/all_clients', [\App\Http\Controllers\ClientController::class, 'show_all'])
    ->middleware(['auth'])->name('all_clients');

Route::get('/clients/{client}', [ClientController::class, 'show'])
    ->middleware(['auth'])->name('client');


//Edit Clients
Route::get('/clients/{client}/edit', [ClientController::class, 'edit']
)->middleware(['auth'])->name('edit_client');

Route::patch('/clients/{client}', [ClientController::class, 'update']);


require __DIR__.'/auth.php';
