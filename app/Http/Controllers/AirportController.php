<?php

namespace App\Http\Controllers;

use App\Models\Airport;
use Illuminate\Http\Request;

class AirportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all airports
        $airports = Airport::all();

        // Return a collection of $airports with pagination
        return response()->json($airports);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required',
            'city' => 'required',
            'country' => 'required',
            'iata' => 'required',
            'icao' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'altitude' => 'required',
            'timezone' => 'required',
            'dst' => 'required',
            'tz_database_time_zone' => 'required',
            'type' => 'required',
            'source' => 'required',
            'active' => 'required',
        ]);

        // Create an airport
        $airport = Airport::create($request->all());

        // Return a response
        return response()->json([
            'message' => 'Airport created successfully',
            'data' => $airport
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Airport $airport)
    {
        // Return a single airport
        return response()->json($airport);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Airport $airport)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required',
            'city' => 'required',
            'country' => 'required',
            'iata' => 'required',
            'icao' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'altitude' => 'required',
            'timezone' => 'required',
            'dst' => 'required',
            'tz_database_time_zone' => 'required',
            'type' => 'required',
            'source' => 'required',
            'active' => 'required',
        ]);

        // Update the airport
        $airport->update($request->all());

        // Return a response
        return response()->json([
            'message' => 'Airport updated successfully',
            'data' => $airport
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Airport $airport)
    {
        // Delete the airport
        $airport->delete();

        // Return a response
        return response()->json([
            'message' => 'Airport deleted successfully'
        ]);
    }
}
