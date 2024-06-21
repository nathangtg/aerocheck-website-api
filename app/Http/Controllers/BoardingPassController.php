<?php

namespace App\Http\Controllers;

use App\Models\BoardingPass;
use Illuminate\Http\Request;

class BoardingPassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all boarding passes
        $boardingPasses = BoardingPass::all();

        // Return a collection of $boardingPasses with pagination
        return response()->json($boardingPasses);
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
            'seat_number' => 'required',
            'gate' => 'required',
            "class" => "required",
            'boarding_time' => 'required',
            'departure_time' => 'required',
            'arrival_time' => 'required',
            'status' => 'required',
        ]);

        // Create a boarding pass
        $boardingPass = BoardingPass::create($request->all());

        // Return a response
        return response()->json([
            'message' => 'Boarding pass created successfully',
            'data' => $boardingPass
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(BoardingPass $boardingPass)
    {
        // Return a single boarding pass
        return response()->json($boardingPass);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BoardingPass $boardingPass)
    {
        // Get the BoardingPass ID
        $boardingPassId = $boardingPass->id;

        // Find the BoardingPass
        $boardingPass = BoardingPass::find($boardingPassId);

        // Check if the BoardingPass exists
        if ($boardingPass) {
            // Update the BoardingPass
            $boardingPass->update($request->all());

            // Return a response
            return response()->json([
                'message' => 'Boarding pass updated successfully',
                'data' => $boardingPass
            ]);
        } else {
            // Return a response
            return response()->json([
                'message' => 'Boarding pass not found'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BoardingPass $boardingPass)
    {
        // Get the BoardingPass ID
        $boardingPassId = $boardingPass->id;

        // Find the BoardingPass
        $boardingPass = BoardingPass::find($boardingPassId);

        // Check if the BoardingPass exists
        if ($boardingPass) {
            // Delete the BoardingPass
            $boardingPass->delete();

            // Return a response
            return response()->json([
                'message' => 'Boarding pass deleted successfully'
            ]);
        } else {
            // Return a response
            return response()->json([
                'message' => 'Boarding pass not found'
            ], 404);
        }
    }
}
