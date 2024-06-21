<?php

namespace App\Http\Controllers;

use App\Models\Passenger;
use Illuminate\Http\Request;

class PassengerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all passengers
        $passengers = Passenger::all();

        // Return a collection of $passengers with pagination
        return response()->json($passengers);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'user_id' => 'required',
            'check_in_code' => 'required',
            'phone' => 'required',
            'flight_id' => 'required',
        ]);

        // Create a passenger
        $passenger = Passenger::create($request->all());

        // Return a response
        if ($passenger) {
            return response()->json([
                'message' => 'Passenger created successfully',
                'data' => $passenger
            ]);
        } else {
            return response()->json([
                'message' => 'Failed to create passenger'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Passenger $passenger)
    {
        // Return a single passenger
        return response()->json($passenger);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Passenger $passenger)
    {
        // Validate the request data
        $request->validate([
            'user_id' => 'required',
            'check_in_code' => 'required',
            'phone' => 'required',
            'flight_id' => 'required',
        ]);

        // Update the passenger
        $passenger->update($request->all());

        // Return a response
        return response()->json([
            'message' => 'Passenger updated successfully',
            'data' => $passenger
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Passenger $passenger)
    {
        // Delete the passenger
        $passenger->delete();

        // Return a response
        return response()->json([
            'message' => 'Passenger deleted successfully'
        ]);
    }
}
