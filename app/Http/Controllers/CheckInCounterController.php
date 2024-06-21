<?php

namespace App\Http\Controllers;

use App\Models\CheckInCounter;
use Illuminate\Http\Request;

class CheckInCounterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all check-in counters
        $checkInCounters = CheckInCounter::all();

        return response()->json([
            'checkInCounters' => $checkInCounters
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'airport_id' => 'required|integer',
            'staff_id' => 'required|integer',
            'flight_id' => 'required|integer',
            'counter_number' => 'required|integer',
        ]);

        // Create a new check-in counter
        $checkInCounter = CheckInCounter::create([
            'airport_id' => $request->airport_id,
            'staff_id' => $request->staff_id,
            'flight_id' => $request->flight_id,
            'counter_number' => $request->counter_number,
        ]);

        return response()->json([
            'checkInCounter' => $checkInCounter
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(CheckInCounter $checkInCounter)
    {
        // Get the check-in counter
        return response()->json([
            'checkInCounter' => $checkInCounter
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CheckInCounter $checkInCounter)
    {
        // Validate the request data
        $request->validate([
            'airport_id' => 'required|integer',
            'staff_id' => 'required|integer',
            'flight_id' => 'required|integer',
            'counter_number' => 'required|integer',
        ]);

        // Update the check-in counter
        $checkInCounter->update([
            'airport_id' => $request->airport_id,
            'staff_id' => $request->staff_id,
            'flight_id' => $request->flight_id,
            'counter_number' => $request->counter_number,
        ]);

        return response()->json([
            'checkInCounter' => $checkInCounter
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CheckInCounter $checkInCounter)
    {
        // Delete the check-in counter
        $checkInCounter->delete();

        return response()->json([
            'message' => 'Check-in counter deleted successfully'
        ]);
    }
}
