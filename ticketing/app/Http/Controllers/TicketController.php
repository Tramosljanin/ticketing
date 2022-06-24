<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Status;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $technicians = User::where('user_type_id', 2)->get() ;
        $statuses = Status::all();

        return view('new_ticket', compact('technicians', 'statuses'));
    }

    public function show_current()
    {
        $tickets = Ticket::where('status_id', 1, 2)->get() ;

        return view('dashboard', compact('tickets'));
    }

    public function show_all()
    {
        $tickets = Ticket::all();

        return view('all_tickets', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tickets = Ticket::all();

        return view('new_ticket', compact('tickets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:150'],
            'description' => ['required', 'text', 'max:500'],
            'client_name' => ['required', 'string', 'max:255'],
            'email' => ['optional', 'string', 'email', 'max:255', 'unique:clients'],
            'phone' => ['optional', 'string', 'max:50', "/^[0-9]*$/", 'unique:clients'],
            'status' => ['required'],
            'technician' => ['required'],
        ]);

        $ticket = Ticket::create([
            'name' => $request->name,
            'description' => $request->description,
            'status_id' => $request->status_id,
            'user_id' => $request->user_id,
            'client_id' => $request->client_id,
            'closed_at' => $request->closed_at,
        ]);

        $client = Client::create([
            'name' => $request->client_name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        event(new Created($client));
        event(new Created($ticket));

        return redirect(RouteServiceProvider::HOME);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
