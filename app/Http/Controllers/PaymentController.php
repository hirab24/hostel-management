<?php

namespace App\Http\Controllers;
use App\Models\Payment;
use App\Models\Resident;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
{
    $payments = Payment::with('resident')
                       ->latest()
                       ->get();

    return view('payments.index', compact('payments'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $residents = Resident::where('status', 'active')
                         ->orderBy('name')
                         ->get();

    return view('payments.create', compact('residents'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'resident_id' => 'required|exists:residents,id',
        'amount' => 'required|numeric|min:0',
        'month' => 'required|string|max:50',
        'payment_date' => 'nullable|date',
        'payment_method' => 'nullable|in:cash,bank_transfer,online',
        'status' => 'required|in:paid,pending',
    ]);

    Payment::create($validated);

    return redirect()
        ->route('payments.index')
        ->with('success', 'Payment recorded successfully.');
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
   
    public function edit(Payment $payment)
{
    $residents = Resident::where('status', 'active')
                         ->orWhere('id', $payment->resident_id)
                         ->orderBy('name')
                         ->get();

    return view('payments.edit', compact('payment', 'residents'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
{
    $validated = $request->validate([
        'resident_id' => 'required|exists:residents,id',
        'amount' => 'required|numeric|min:0',
        'month' => 'required|string|max:50',
        'payment_date' => 'nullable|date',
        'payment_method' => 'nullable|in:cash,bank_transfer,online',
        'status' => 'required|in:paid,pending',
    ]);

    $payment->update($validated);

    return redirect()
        ->route('payments.index')
        ->with('success', 'Payment updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     */
   public function destroy(Payment $payment)
{
    $payment->delete();

    return redirect()
        ->route('payments.index')
        ->with('success', 'Payment deleted successfully.');
}
}
