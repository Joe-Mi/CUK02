<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Event;
use App\Models\KeyDate;

use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Event $event)
    {
        $event = Event::latest()->first();
        return redirect()->route('admin.statistics.show', $event);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show()
    {
        $event = Event::latest()->first();
        // key dates
        $keyDates = $event->keyDates()->orderBy('start_date')->get();

        // ticket sales grouped by date
        $sales = Ticket::where('event_id', $event->id)
            ->selectRaw('DATE(created_at) as date, COUNT(*) as total')
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $salesDates = $sales->pluck('date');
        $salesCounts = $sales->pluck('total');

        // total tickets sold
        $ticketsSold = Ticket::where('event_id', $event->id)->count();

        // remaining capacity
        $remainingCapacity = max(0, $event->capacity - $ticketsSold);

        return view('admin.statistics.index', compact(
            'event',
            'keyDates',
            'salesDates',
            'salesCounts',
            'ticketsSold',
            'remainingCapacity'
        ));
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
