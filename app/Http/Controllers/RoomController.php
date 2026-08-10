<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  public function index()
{
    $rooms = Room::latest()->get();

    return view('rooms.index', compact('rooms'));
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    return view('rooms.create');
}

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    $validated = $request->validate([
        'room_number' => 'required|string|max:50|unique:rooms,room_number',
        'floor' => 'required|integer|min:0',
        'capacity' => 'required|integer|min:1',
        'available_beds' => 'required|integer|min:0|lte:capacity',
        'monthly_rent' => 'required|numeric|min:0',
        'status' => 'required|in:available,full,maintenance',
    ]);

    Room::create($validated);

    return redirect()
        ->route('rooms.index')
        ->with('success', 'Room created successfully.');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    
    public function edit(Room $room)
{
    return view('rooms.edit', compact('room'));
}

    /**
     * Update the specified resource in storage.
     */
    
    public function update(Request $request, Room $room)
{
    $validated = $request->validate([
        'room_number' => 'required|string|max:50|unique:rooms,room_number,' . $room->id,
        'floor' => 'required|integer|min:0',
        'capacity' => 'required|integer|min:1',
        'available_beds' => 'required|integer|min:0|lte:capacity',
        'monthly_rent' => 'required|numeric|min:0',
        'status' => 'required|in:available,full,maintenance',
    ]);

    $room->update($validated);

    return redirect()
        ->route('rooms.index')
        ->with('success', 'Room updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
{
    $room->delete();

    return redirect()
        ->route('rooms.index')
        ->with('success', 'Room deleted successfully.');
}
}
