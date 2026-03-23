<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Event;
use App\Models\Ticket;
use App\Models\Customer;
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
        $validatedCustomer = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'number' => 'required|string',
            'address' => 'required|string'
        ]);

        $customer = Customer::create($validatedCustomer);

        $validatedTicket = $request->validate([
            'ticket_type_id' => 'nullable|integer', // should be integer, not array
        ]);

        $ticket = Ticket::create([
            'customer_id' => $customer->id,
            'ticket_type_id' => $validatedTicket['ticket_type_id'] ?? null,
        ]);

        // Eager load relations so Blade can access them 
        $ticket->load(['customer', 'ticketType']);
        
        $qrUrl = url('/ticket/' . $ticket->id);
        $qrCodeApiUrl = 'https://api.qrserver.com/v1/create-qr-code/?size=150x150&margin=1&format=svg&data=' . urlencode($qrUrl);
        $qrCodeImage = '';
        try {
            $svgContent = file_get_contents($qrCodeApiUrl);
            $qrCodeImage = 'data:image/svg+xml;base64,' . base64_encode($svgContent);
        } catch (\Exception $e) {
            // Silently fail if API is unreachable
        }

        // Render a Blade partial that contains #ticket-result-section 
        return view('partials.ticket_result', [ 'customerTicket' => $ticket, 'qrCodeImage' => $qrCodeImage ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Ticket $ticket)
    {
        $event = Event::where('status', 'active')
            ->with('ticketTypes')
            ->first();

        $ticketTypes = $event?->ticketTypes ?? collect();

        //get the details of a ticket.
        $customerTicket = Ticket::where('id', $ticket->id)
            ->with('ticketType', 'customer')->first();

        $qrUrl = url('/ticket/' . $ticket->id);
        $qrCodeApiUrl = 'https://api.qrserver.com/v1/create-qr-code/?size=150x150&margin=1&format=svg&data=' . urlencode($qrUrl);
        $qrCodeImage = '';
        try {
            $svgContent = file_get_contents($qrCodeApiUrl);
            $qrCodeImage = 'data:image/svg+xml;base64,' . base64_encode($svgContent);
        } catch (\Exception $e) {
            // Silently fail if API is unreachable
        }

        // Handle PDF download if requested
        if ($request->has('download')) {
            $pdf = Pdf::loadView('ticket_pdf', compact('ticketTypes', 'customerTicket', 'qrCodeImage'));
            return $pdf->download('ticket_#' . $ticket->id . '.pdf');
        }

        return view('ticket_pdf', compact('ticketTypes', 'customerTicket', 'qrCodeImage'));
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
