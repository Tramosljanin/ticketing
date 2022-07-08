<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Status;
use App\Models\Ticket;
use App\Models\User;
use App\Providers\RouteServiceProvider;
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

    public function show_active(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $tickets = Ticket::query()->where('status_id',2)->get();

        $id = Ticket::all();

        return view('dashboard', compact('tickets', 'id'));
    }

    public function show_all()
    {
        $tickets = Ticket::all();

        $id = Ticket::all();

        return view('all_tickets', compact('tickets', 'id'));
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request): \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
    {
        $ticket_attributes = request()->validate([
            'title' => ['required', 'string', 'max:150'],
            'description' => ['required', 'max:500'],
            'status_id' => 'required',
        ]);

        $client_attributes = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['string', 'email', 'max:255'],
            'phone' => ['string', 'max:50'],
        ]);

        $client_attributes['user_id'] = auth()->id();
        $ticket_attributes['user_id'] = auth()->id();

        $new_client = Client::query()->create($client_attributes);
        $ticket_attributes['client_id'] = $new_client->id;
        $ticket_attributes['name'] = $ticket_attributes['title'];

        Ticket::query()->create($ticket_attributes);

        return redirect(RouteServiceProvider::HOME);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Ticket $ticket): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $ticket->load(['status', 'client', 'user']);
        //dd($ticket->toArray());

        return view('ticket', compact( 'ticket'));
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
     * Update the specified
     * resource in storage.
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
