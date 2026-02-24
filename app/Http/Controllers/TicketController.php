<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Ticket;
use App\Models\TicketType;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $event = Event::where('status', 'active')
            ->with('ticketTypes')
            ->first();

        // Ensure we pass an iterable (collection) to the view even when there's
        // no active event to avoid foreach() null errors in the Blade template.
        $ticketTypes = $event?->ticketTypes ?? collect();

        return view('registration', compact('ticketTypes'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $event = Event::where('status', 'active')
            ->with('ticketTypes')
            ->first();

        // Provide an empty collection if no event is active to keep views safe.
        $ticketTypes = $event?->ticketTypes ?? collect();

        return view('ticket', compact('ticketTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
