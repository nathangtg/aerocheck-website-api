<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all staff
        $staff = Staff::all();

        // Return a collection of $staff with pagination
        return response()->json($staff);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'user_id' => 'required',
            'position' => 'required',
            'salary' => 'required|numeric',
            'hire_date' => 'required|date',
            'fire_date' => 'nullable|date',
            'active' => 'required|boolean',
        ]);

        // Log the request data for debugging
        Log::info('Creating staff: ' . json_encode($request->all()));

        // Attempt to create a staff record
        $staff = Staff::create([
            'user_id' => $request->user_id,
            'position' => $request->position,
            'salary' => $request->salary,
            'hire_date' => $request->hire_date,
            'fire_date' => $request->fire_date,
        ]);

        // Check if staff was created successfully
        if ($staff) {
            Log::info('Staff created successfully: ' . json_encode($staff));
            return response()->json([
                'message' => 'Staff created successfully',
                'data' => $staff
            ]);
        } else {
            Log::error('Failed to create staff: ' . json_encode($request->all()));
            return response()->json([
                'message' => 'Staff not created',
                'data' => null,
            ], 500); // Use appropriate HTTP status code for error
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(Staff $staff)
    {
        // Return a single staff
        return response()->json($staff);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Staff $staff)
    {
        // Get the Staff ID
        $staffId = $staff->id;

        // Validate the request data
        $request->validate([
            'user_id' => 'required',
            'position' => 'required',
            'salary' => 'required|numeric',
            'hire_date' => 'required|date',
            'fire_date' => 'nullable|date',
            'active' => 'required|boolean',
        ]);

        // Find the Staff
        // Check if the Staff exists
        if ($staff) {
            // Update the Staff
            $staff->update($request->all());

            // Return a response
            return response()->json([
                'message' => 'Staff updated successfully',
                'data' => $staff
            ]);
        } else {
            // Return a response
            return response()->json([
                'message' => 'Staff not found'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Staff $staff)
    {
        // Get the Staff ID
        $staffId = $staff->id;

        // Find the Staff
        $staff = Staff::find($staffId);

        // Check if the Staff exists
        if ($staff) {
            // Delete the Staff
            $staff->delete();

            // Return a response
            return response()->json([
                'message' => 'Staff deleted successfully'
            ]);
        } else {
            // Return a response
            return response()->json([
                'message' => 'Staff not found'
            ]);
        }
    }
}
