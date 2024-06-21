<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all users
        $users = User::all();

        // Return a collection of $users with pagination
        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        // Get the User ID
        $userId = $user->id;

        // Find the User
        $user = User::find($userId);

        // Check if the User exists
        if ($user) {
            // Update the User
            $user->update($request->all());

            // Return a response
            return response()->json([
                'message' => 'User updated successfully',
                'data' => $user
            ]);
        } else {
            // Return a response
            return response()->json([
                'message' => 'User not found'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // Get the User ID
        $userId = $user->id;

        // Find the User
        $user = User::find($userId);

        // Check if the User exists
        if ($user) {
            // Delete the User
            $user->delete();

            // Return a response
            return response()->json([
                'message' => 'User deleted successfully'
            ]);
        } else {
            // Return a response
            return response()->json([
                'message' => 'User not found'
            ], 404);
        }
    }
}
