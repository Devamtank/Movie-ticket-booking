<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
    public function index()
    {
        // Fetch all rooms from the database
        $room = Room::all();

        // Return the index view and pass the rooms data
        return view('manager.room-index', compact('room'));
    }
    public function create()
    {
        return view('manager.room-create'); // Show the form to create a new room
    }

    // Store a newly created room in the database
    public function store(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'title' => 'required|string|max:255',
            'size' => 'required|integer|min:1',
        ]);

        // Create a new room and store it in the database
        $room = new Room();
        $room->title = $request->input('title');
        $room->size = $request->input('size');
        $room->save(); // Save the room in the database

        // Redirect back to the room list or another route with a success message
        return redirect()->route('manager.room.index')->with('success', 'Room created successfully!');
    }
    public function edit($id)
    {
        $room = Room::findOrFail($id); // Find the room by its ID
        return view('manager.room-edit', compact('room')); // Return the edit view with the room data
    }

    // Update the specified room in the database
    public function update(Request $request, $id)
    {
        // Validate the incoming request
        $request->validate([
            'title' => 'required|string|max:255',
            'size' => 'required|string|max:255',
        ]);

        $room = Room::findOrFail($id); // Find the room by its ID
        $room->update([
            'title' => $request->title,
            'size' => $request->size,
        ]);

        // Redirect with a success message
        return redirect()->route('manager.room.index')->with('success', 'Room updated successfully.');
    }

    // Remove the specified room from the database
    public function destroy($id)
    {
        $room = Room::findOrFail($id); // Find the room by its ID
        $room->delete(); // Delete the room from the database

        // Redirect with a success message
        return redirect()->route('manager.room.index')->with('success', 'Room deleted successfully.');
    }
}
