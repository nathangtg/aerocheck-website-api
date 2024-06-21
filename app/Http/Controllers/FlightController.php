<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all flights
        $flights = Flight::all();

        // Return a collection of $flights with pagination
        return response()->json($flights);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'airline_id' => 'required',
            'departure_airport' => 'required',
            'arrival_airport' => 'required',
            'departure_time' => 'required',
            'arrival_time' => 'required',
            'flight_number' => 'required',
            'status' => 'required',
        ]);

        // Create a flight
        $flight = Flight::create($request->all());

        // Return a response
        return response()->json([
            'message' => 'Flight created successfully',
            'data' => $flight
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Flight $flight)
    {
        // Return a single flight
        return response()->json($flight);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Flight $flight)
    {
        // Validate the request data
        $request->validate([
            'airline_id' => 'required',
            'departure_airport' => 'required',
            'arrival_airport' => 'required',
            'departure_time' => 'required',
            'arrival_time' => 'required',
            'flight_number' => 'required',
            'status' => 'required',
        ]);

        // Update the flight
        $flight->update($request->all());

        // Return a response
        return response()->json([
            'message' => 'Flight updated successfully',
            'data' => $flight
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Flight $flight)
    {
        // Delete the flight
        $flight->delete();

        // Return a response
        return response()->json([
            'message' => 'Flight deleted successfully'
        ]);
    }
}
