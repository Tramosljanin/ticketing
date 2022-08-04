<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Status;
use App\Models\Ticket;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize('agent');

        $technicians = User::where('user_type_id', 2)->get() ;
        $statuses = Status::all();

        return view('new_ticket', compact('technicians', 'statuses'));
    }

    public function show_active(): Factory|View|Application
    {
        if(auth()->user()->can('agent')){
            $tickets = Ticket::query()->where('status_id', '1')->paginate();
        }
        elseif(auth()->user()->can('technician')){
            $tickets = Ticket::query()->where('user_id', auth()->id())->paginate();
        }

        return view('dashboard', compact('tickets'));
    }

    public function show_all(): Factory|View|Application
    {
        if(auth()->user()->can('agent')){
            $tickets = Ticket::query()->paginate();
        }
        elseif(auth()->user()->can('technician')){
            $tickets = Ticket::query()->where('status_id', 3)->paginate();
        }

        return view('all_tickets', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        $tickets = Ticket::all();

        return view('new_ticket', compact('tickets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request): Application|RedirectResponse|\Illuminate\Routing\Redirector
    {
        $this->authorize('agent');

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
     * @param Ticket $ticket
     * @return Application|Factory|View
     */
    public function show(Ticket $ticket): View|Factory|Application
    {
        $ticket->load(['status', 'client', 'user']);

        return view('ticket', compact( 'ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Ticket $ticket
     * @return Application|Factory|View
     */
    public function edit(Ticket $ticket): View|Factory|Application
    {
        $ticket->load(['status', 'client', 'user']);
        $users = User::where('user_type_id', 2)->get() ;
        $statuses = Status::all();

        return view('edit_ticket', compact('ticket', 'users', 'statuses'));
    }

    /**
     * Update the specified
     * resource in storage.
     *
     * @param Ticket $ticket
     * @return RedirectResponse
     */
    public function update(Ticket $ticket, Request $request)
    {
        $ticket_attributes = $request->validate([
            'name' => ['required', 'string', 'max:150'],
            'description' => ['required', 'max:500'],
            'status_id' => 'required',
            'user_id' => 'required',
        ]);

        $ticket->update($ticket_attributes);

        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Ticket $ticket
     * @return RedirectResponse
     */
    public function destroy($id)

    {
        $this->authorize('agent');

        $ticket = Ticket::where('id', $id);
        $ticket->delete();

        return back()->with('success', 'Ticket Deleted!');
    }
}
