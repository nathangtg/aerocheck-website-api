<?php

namespace App\Http\Controllers;

use App\Models\SelfService;
use Illuminate\Http\Request;

class SelfServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all self services
        $selfServices = SelfService::all();

        // Return a collection of $selfServices with pagination
        return response()->json($selfServices);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'airport_id' => 'required',
            'passenger_id' => 'required',
            'flight_id' => 'required',
            'status' => 'required',
        ]);

        // Create a self service
        $selfService = SelfService::create($request->all());

        // Return a response
        return response()->json([
            'message' => 'Self service created successfully',
            'data' => $selfService
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(SelfService $selfService)
    {
        // Return a single self service
        return response()->json($selfService);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SelfService $selfService)
    {
        // Validate the request data
        $request->validate([
            'airport_id' => 'required',
            'passenger_id' => 'required',
            'flight_id' => 'required',
            'status' => 'required',
        ]);

        // Update the self service
        $selfService->update($request->all());

        // Return a response
        return response()->json([
            'message' => 'Self service updated successfully',
            'data' => $selfService
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SelfService $selfService)
    {
        // Delete the self service
        $selfService->delete();

        // Return a response
        return response()->json([
            'message' => 'Self service deleted successfully'
        ]);
    }
}
