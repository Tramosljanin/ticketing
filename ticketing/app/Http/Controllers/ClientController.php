<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Ticket;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    public function show_all()
    {
        $clients = Client::all();

        $id = Client::all();

        return view('clients', compact('clients', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        $clients = Client::all();

        return view('new_ticket', compact('clients'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Client $client
     * @return Application|Factory|View
     */
    public function show(Client $client): View|Factory|Application
    {
        $client->load('ticket');

        return view('client', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Client $client
     * @return Application|Factory|View
     */
    public function edit(Client $client)
    {
        $this->authorize('agent');

        return view('edit_client', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Client $client
     * @return Response
     */
    public function update(Client $client, Request $request)
    {
        $this->authorize('agent');

        $client_attributes = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['string', 'email', 'max:255'],
            'phone' => ['string', 'max:50'],
        ]);

        $client->update($client_attributes);

        return back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Client $client
     * @return Response
     */
    public function destroy(Client $client)
    {
        //
    }
}
