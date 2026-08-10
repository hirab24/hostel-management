<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Resident;
use App\Models\Payment;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalRooms = Room::count();

        $totalResidents = Resident::where('status', 'active')->count();

        $availableBeds = Room::sum('available_beds');

        $thisMonthCollection = Payment::where('status', 'paid')
            ->whereMonth('payment_date', now()->month)
            ->whereYear('payment_date', now()->year)
            ->sum('amount');

        $pendingPayments = Payment::where('status', 'pending')
            ->sum('amount');

        return view('admin.dashboard', compact(
            'totalRooms',
            'totalResidents',
            'availableBeds',
            'thisMonthCollection',
            'pendingPayments'
        ));
    }
}