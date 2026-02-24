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
        $event = Event::all()->first();
        $scheduale = EventSchedule::where('event_id', $event->id)->get();
        return view('admin.register.index', compact('event', 'scheduale'));
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
            'name' => 'required',
            'qr_image' => 'required',
        ]);
        //
        $scheduleAttendance = ScheduleAttendance::create($request->all());
        return redirect()->route('admin.attendance.show', $scheduleAttendance->id)->with('success', 'Attendance recorded successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(EventSchedule $attendance)
    {
        $block = $attendance;
        $status = null;
        $ticket = null;
        return view('admin.register.attendance', compact('block', 'status', 'ticket'));
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
