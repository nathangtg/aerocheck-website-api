<?php

namespace App\Http\Controllers;

use App\Models\Baggage;
use Illuminate\Http\Request;

class BaggageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all baggage
        $baggage = Baggage::all();

        // Return a collection of $baggage with pagination
        return response()->json($baggage);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'passenger_id' => 'required',
            'flight_id' => 'required',
            'tag_number' => 'required',
            'weight' => 'required',
            'status' => 'required',
        ]);

        // Create a new baggage
        $baggage = Baggage::create($request->all());

        // Return a response
        return response()->json([
            'message' => 'Baggage created successfully',
            'data' => $baggage
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Baggage $baggage)
    {
        // Return a single baggage
        return response()->json($baggage);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Baggage $baggage)
    {
        // Get the Baggage ID
        $baggageId = $baggage->id;

        // Find the Baggage
        $baggage = Baggage::find($baggageId);

        // Check if the Baggage exists
        if ($baggage) {
            // Update the Baggage
            $baggage->update($request->all());

            // Return a response
            return response()->json([
                'message' => 'Baggage updated successfully',
                'data' => $baggage
            ]);
        } else {
            // Return a response
            return response()->json([
                'message' => 'Baggage not found'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Baggage $baggage)
    {
        // Get the Baggage ID
        $baggageId = $baggage->id;

        // Find the Baggage
        $baggage = Baggage::find($baggageId);

        // Check if the Baggage exists
        if ($baggage) {
            // Delete the Baggage
            $baggage->delete();

            // Return a response
            return response()->json([
                'message' => 'Baggage deleted successfully'
            ]);
        } else {
            // Return a response
            return response()->json([
                'message' => 'Baggage not found'
            ], 404);
        }

    }
}
