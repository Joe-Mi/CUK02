<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class eventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = [
            [
                'name' => 'testEvent0',
                'venue' => 'testaddress0',
                'remainingTickets' => 400
            ],
            [
                'name' => 'testEvent1',
                'venue' => 'testaddress1',
                'remainingTickets' => 800
            ],
            [
                'name' => 'testEvent2',
                'venue' => 'testaddress2',
                'remainingTickets' => 1600
            ]
        ];

        return view('home', ['events' => $events]);
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
