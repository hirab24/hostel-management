<?php

namespace App\Http\Controllers;
use App\Models\Complaint;
use App\Models\Resident;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $complaints = Complaint::with('resident')
                           ->latest()
                           ->get();

    return view('complaints.index', compact('complaints'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $residents = Resident::where('status', 'active')
                         ->orderBy('name')
                         ->get();

    return view('complaints.create', compact('residents'));
}
    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    $validated = $request->validate([
        'resident_id' => 'required|exists:residents,id',
        'subject' => 'required|string|max:255',
        'description' => 'required|string',
        'priority' => 'required|in:low,medium,high',
    ]);

    $complaint = Complaint::create($validated);

    Http::post('http://localhost:3000/complaint-created', [
        'id' => $complaint->id,
        'resident_id' => $complaint->resident_id,
        'subject' => $complaint->subject,
        'priority' => $complaint->priority,
        'status' => $complaint->status,
    ]);

    return redirect()
        ->route('complaints.index')
        ->with('success', 'Complaint submitted successfully.');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, Complaint $complaint)
{
    $validated = $request->validate([
        'status' => 'required|in:pending,in_progress,resolved',
    ]);

    $complaint->update($validated);

    return redirect()
        ->route('complaints.index')
        ->with('success', 'Complaint status updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
