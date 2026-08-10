<?php

namespace App\Http\Controllers;
use App\Models\Resident;
use App\Models\Room;
use Illuminate\Http\Request;

class ResidentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $residents = Resident::with('room')->latest()->get();

    return view('residents.index', compact('residents'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $rooms = Room::where('status', 'available')
                 ->where('available_beds', '>', 0)
                 ->get();

    return view('residents.create', compact('rooms'));
}

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:residents,email',
        'phone' => 'required|string|max:20',
        'cnic' => 'required|string|max:20|unique:residents,cnic',
        'guardian_name' => 'required|string|max:255',
        'guardian_phone' => 'required|string|max:20',
        'room_id' => 'required|exists:rooms,id',
        'check_in_date' => 'required|date',
        'monthly_fee' => 'required|numeric|min:0',
    ]);

    $room = Room::findOrFail($validated['room_id']);

    if ($room->available_beds <= 0) {
        return back()
            ->withErrors(['room_id' => 'This room has no available beds.'])
            ->withInput();
    }

    Resident::create($validated);

    $room->decrement('available_beds');

    if ($room->available_beds == 0) {
        $room->update(['status' => 'full']);
    }

    return redirect()
        ->route('residents.index')
        ->with('success', 'Resident added successfully.');
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
 public function edit(Resident $resident)
{
    $rooms = Room::where('available_beds', '>', 0)
                 ->orWhere('id', $resident->room_id)
                 ->get();

    return view('residents.edit', compact('resident', 'rooms'));
}
    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, Resident $resident)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:residents,email,' . $resident->id,
        'phone' => 'required|string|max:20',
        'cnic' => 'required|string|max:20|unique:residents,cnic,' . $resident->id,
        'guardian_name' => 'required|string|max:255',
        'guardian_phone' => 'required|string|max:20',
        'room_id' => 'required|exists:rooms,id',
        'check_in_date' => 'required|date',
        'monthly_fee' => 'required|numeric|min:0',
        'status' => 'required|in:active,left',
    ]);

    $oldRoom = $resident->room;
    $newRoom = Room::findOrFail($validated['room_id']);

    if ($oldRoom && $oldRoom->id != $newRoom->id) {

        $oldRoom->increment('available_beds');

        if ($oldRoom->status === 'full') {
            $oldRoom->update(['status' => 'available']);
        }

        if ($newRoom->available_beds <= 0) {
            return back()
                ->withErrors(['room_id' => 'The selected room has no available beds.'])
                ->withInput();
        }

        $newRoom->decrement('available_beds');

        if ($newRoom->available_beds == 0) {
            $newRoom->update(['status' => 'full']);
        }
    }

    $resident->update($validated);

    return redirect()
        ->route('residents.index')
        ->with('success', 'Resident updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     */
   public function destroy(Resident $resident)
{
    $room = $resident->room;

    $resident->delete();

    if ($room) {

        $room->increment('available_beds');

        if ($room->status === 'full') {
            $room->update(['status' => 'available']);
        }
    }

    return redirect()
        ->route('residents.index')
        ->with('success', 'Resident deleted successfully.');
}
}
