<?php

namespace App\Http\Controllers;

use App\Models\Airline;
use Illuminate\Http\Request;

class AirlineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all airlines
        $airlines = Airline::all();

        // Return a collection of $airlines with pagination
        return response()->json($airlines);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required',
            'icao' => 'required|unique:airlines,icao,'.$id, // Ensure uniqueness excluding the current record
            'iata' => 'required|unique:airlines,iata,'.$id, // Ensure uniqueness excluding the current record
            'callsign' => 'required',
            'country' => 'required',
        ]);


        // Create an airline
        $airline = Airline::create($request->all());

        // Return a response
        return response()->json([
            'message' => 'Airline created successfully',
            'data' => $airline
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Airline $airline)
    {
        // Return a single airline
        return response()->json($airline);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Airline $airline)
    {
        // Get the Airline ID
        $airlineId = $airline->id;

        // Find the Airline
        $airline = Airline::find($airlineId);

        // Check if the Airline exists
        if ($airline) {
            // Update the Airline
            $airline->update($request->all());

            // Return a response
            return response()->json([
                'message' => 'Airline updated successfully',
                'data' => $airline
            ]);
        } else {
            // Return a response
            return response()->json([
                'message' => 'Airline not found'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Airline $airline)
    {
        // Get the Airline ID
        $airlineId = $airline->id;

        // Find the Airline
        $airline = Airline::find($airlineId);

        // Check if the Airline exists
        if ($airline) {
            // Delete the Airline
            $airline->delete();

            // Return a response
            return response()->json([
                'message' => 'Airline deleted successfully'
            ]);
        } else {
            // Return a response
            return response()->json([
                'message' => 'Airline not found'
            ], 404);
        }
    }
}
