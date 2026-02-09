<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class eventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::with('keyDates')->paginate(10);
        return view('admin.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'venue' => 'required|string|max:255',
            'duration' => 'nullable|integer',
            'capacity' => 'nullable|integer',
            'key_dates' => 'nullable|array',
            'key_dates.*.title' => 'required|string',
            'key_dates.*.type' => 'required|string',
            'key_dates.*.start_date' => 'required|date',
            'key_dates.*.end_date' => 'required|date',
            'key_dates.*.status' => 'required|string',
        ]);

        $event = Event::create($validated);

        if (!empty($validated['key_dates'])) {
            foreach ($validated['key_dates'] as $date) {
                $event->keyDates()->create($date);
            }
        }

        return redirect()->route('admin.events.index')->with('success', 'Event created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return view('admin.events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        $event->load('keyDates');
        return view('admin.events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'venue' => 'required|string|max:255',
            'duration' => 'nullable|integer',
            'capacity' => 'nullable|integer',
            'key_dates' => 'nullable|array',
            'key_dates.*.id' => 'nullable|exists:key_dates,id',
            'key_dates.*.title' => 'required|string',
            'key_dates.*.type' => 'required|string',
            'key_dates.*.start_date' => 'required|date',
            'key_dates.*.end_date' => 'required|date',
            'key_dates.*.status' => 'required|string',
            'remove_key_dates' => 'nullable|array', // IDs to remove
        ]);

        $event->update($validated);

        // Handle Key Dates
        if (!empty($validated['key_dates'])) {
            foreach ($validated['key_dates'] as $dateData) {
                if (isset($dateData['id'])) {
                    $date = $event->keyDates()->find($dateData['id']);
                    if ($date) {
                        $date->update($dateData);
                    }
                } else {
                    $event->keyDates()->create($dateData);
                }
            }
        }

        if (!empty($validated['remove_key_dates'])) {
            $event->keyDates()->whereIn('id', $validated['remove_key_dates'])->delete();
        }

        return redirect()->route('admin.events.index')->with('success', 'Event updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('admin.events.index')->with('success', 'Event deleted successfully.');
    }
}
