<?php

namespace App\Http\Controllers;

use App\Models\EventSchedule;
use App\Models\Event;
use App\Models\ScheduleAttendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $event = Event::where('status', 'active')->first();
        $scheduale = EventSchedule::where('event_id', $event->id)->get();
        
        $registeredAttendees = \App\Models\Ticket::with(['customer', 'ticketType'])
            ->whereHas('ticketType', function ($query) use ($event) {
                $query->where('event_id', $event->id);
            })
            ->get();

        return view('admin.register.index', compact('event', 'scheduale', 'registeredAttendees'));
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
        $request->validate([
            'ticket_id' => 'required',
            'schedule_id' => 'required',
        ]);
        //
        $scheduleAttendance = ScheduleAttendance::create([
            'ticket_id' => $request->ticket_id,
            'schedule_id' => $request->schedule_id,
            'attended' => true
        ]);
        return redirect()->route('admin.attendance.show', $request->schedule_id)->with('success', 'Attendance recorded successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(EventSchedule $attendance)
    {
        $block = $attendance;
        $status = null;
        $ticket = null;
        
        $attendees = ScheduleAttendance::with(['ticket.customer', 'ticket.ticketType'])
            ->where('schedule_id', $block->id)
            ->get();

        return view('admin.register.attendance', compact('block', 'status', 'ticket', 'attendees'));
    }

    /**
     * Display the event tag (badge) for a specific ticket.
     */
    public function tag(\App\Models\Ticket $ticket)
    {
        $ticket->load(['customer', 'ticketType', 'ticketType.event']);
        return view('admin.register.tag', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EventSchedule $EventSchedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EventSchedule $EventSchedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EventSchedule $EventSchedule)
    {
        //
    }
}
