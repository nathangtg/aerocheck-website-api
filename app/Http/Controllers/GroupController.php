<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all groups
        $groups = Group::all();

        // Return a collection of $groups with pagination
        return response()->json($groups);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'leader_id' => 'required | integer',
            'passenger_id' => 'required | integer',
            'flight_id' => 'required | integer',
        ]);

        // Create a group
        $group = Group::create($request->all());

        return response()->json([
            'message' => 'Group created successfully',
            'data' => $group
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group)
    {
        // Return a single group
        return response()->json($group);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Group $group)
    {
        // Validate the request data
        $request->validate([
            'leader_id' => 'required | integer',
            'passenger_id' => 'required | integer',
            'flight_id' => 'required | integer',
        ]);

        // Update the group
        $group->update($request->all());

        return response()->json([
            'message' => 'Group updated successfully',
            'data' => $group
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group)
    {
        // Delete the group
        $group->delete();

        return response()->json([
            'message' => 'Group deleted successfully'
        ]);
    }
}
