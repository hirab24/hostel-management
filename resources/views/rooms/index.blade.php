<x-app-layout>

    <style>
        .rooms-page {
            padding: 35px;
            background: #f5f7fb;
            min-height: calc(100vh - 64px);
        }

        /* Header */

        .rooms-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 28px;
        }

        .rooms-heading {
            margin: 0;
            font-size: 30px;
            font-weight: 700;
            color: #172033;
        }

        .rooms-description {
            margin: 7px 0 0;
            color: #718096;
            font-size: 14px;
        }

        .add-room-btn {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: #2563eb;
            color: #ffffff;
            text-decoration: none;
            padding: 11px 18px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            box-shadow: 0 4px 10px rgba(37, 99, 235, 0.20);
            transition: all 0.2s ease;
        }

        .add-room-btn:hover {
            background: #1d4ed8;
            transform: translateY(-1px);
            box-shadow: 0 6px 14px rgba(37, 99, 235, 0.25);
        }


        /* Success Message */

        .success-message {
            background: #ecfdf5;
            color: #047857;
            border: 1px solid #a7f3d0;
            padding: 13px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }


        /* Table Card */

        .rooms-table-card {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            box-shadow: 0 4px 18px rgba(15, 23, 42, 0.05);
            overflow: hidden;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        .rooms-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 850px;
        }


        /* Table Header */

        .rooms-table thead {
            background: #f8fafc;
        }

        .rooms-table th {
            padding: 16px 18px;
            text-align: left;
            font-size: 13px;
            font-weight: 600;
            color: #64748b;
            border-bottom: 1px solid #e5e7eb;
            white-space: nowrap;
        }


        /* Table Body */

        .rooms-table td {
            padding: 17px 18px;
            font-size: 14px;
            color: #475569;
            border-bottom: 1px solid #f1f5f9;
        }

        .rooms-table tbody tr {
            transition: background 0.2s ease;
        }

        .rooms-table tbody tr:hover {
            background: #f8fbff;
        }

        .rooms-table tbody tr:last-child td {
            border-bottom: none;
        }


        /* Room */

        .room-number {
            font-weight: 700;
            color: #1e293b;
        }


        /* Rent */

        .room-rent {
            font-weight: 600;
            color: #1e293b;
        }


        /* Available Beds */

        .available-beds {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 32px;
            height: 30px;
            padding: 0 9px;
            border-radius: 20px;
            background: #eff6ff;
            color: #2563eb;
            font-weight: 600;
            font-size: 13px;
        }


        /* Status */

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 6px 11px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .status-available {
            background: #dcfce7;
            color: #15803d;
        }

        .status-full {
            background: #fee2e2;
            color: #dc2626;
        }

        .status-other {
            background: #fef3c7;
            color: #b45309;
        }


        /* Actions */

        .actions {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .edit-btn {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            color: #2563eb;
            background: #eff6ff;
            border: 1px solid #bfdbfe;
            padding: 7px 11px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 12px;
            font-weight: 600;
            transition: 0.2s;
        }

        .edit-btn:hover {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .delete-btn {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            color: #dc2626;
            background: #fef2f2;
            border: 1px solid #fecaca;
            padding: 7px 11px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 12px;
            font-weight: 600;
            transition: 0.2s;
        }

        .delete-btn:hover {
            background: #fee2e2;
            color: #b91c1c;
        }


        /* Empty State */

        .empty-state {
            text-align: center;
            padding: 50px 20px !important;
        }

        .empty-icon {
            font-size: 38px;
            margin-bottom: 10px;
        }

        .empty-title {
            color: #334155;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .empty-text {
            color: #94a3b8;
            font-size: 13px;
        }


        /* Mobile */

        @media (max-width: 768px) {

            .rooms-page {
                padding: 20px;
            }

            .rooms-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .rooms-heading {
                font-size: 25px;
            }

            .add-room-btn {
                width: 100%;
                justify-content: center;
                box-sizing: border-box;
            }
        }
    </style>


    <div class="rooms-page">

        <!-- Header -->

        <div class="rooms-header">

            <div>

                <h1 class="rooms-heading">
                    🏠 Rooms
                </h1>

                <p class="rooms-description">
                    Manage hostel rooms, capacity and availability
                </p>

            </div>


            <a
                href="{{ route('rooms.create') }}"
                class="add-room-btn"
            >
                ➕ Add Room
            </a>

        </div>


        <!-- Success Message -->

        @if(session('success'))

            <div class="success-message">
                ✅ {{ session('success') }}
            </div>

        @endif


        <!-- Table -->

        <div class="rooms-table-card">

            <div class="table-wrapper">

                <table class="rooms-table">

                    <thead>

                        <tr>

                            <th>🏠 Room</th>

                            <th>🏢 Floor</th>

                            <th>👥 Capacity</th>

                            <th>🛏️ Available Beds</th>

                            <th>💰 Monthly Rent</th>

                            <th>📌 Status</th>

                            <th>⚙️ Actions</th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($rooms as $room)

                            <tr>

                                <!-- Room -->

                                <td class="room-number">
                                    Room {{ $room->room_number }}
                                </td>


                                <!-- Floor -->

                                <td>
                                    Floor {{ $room->floor }}
                                </td>


                                <!-- Capacity -->

                                <td>
                                    {{ $room->capacity }} beds
                                </td>


                                <!-- Available Beds -->

                                <td>

                                    <span class="available-beds">
                                        {{ $room->available_beds }}
                                    </span>

                                </td>


                                <!-- Rent -->

                                <td class="room-rent">
                                    Rs. {{ number_format($room->monthly_rent, 2) }}
                                </td>


                                <!-- Status -->

                                <td>

                                    @if($room->status === 'available')

                                        <span class="status-badge status-available">
                                            🟢 Available
                                        </span>

                                    @elseif($room->status === 'full')

                                        <span class="status-badge status-full">
                                            🔴 Full
                                        </span>

                                    @else

                                        <span class="status-badge status-other">
                                            🟡 {{ ucfirst($room->status) }}
                                        </span>

                                    @endif

                                </td>


                                <!-- Actions -->

                                <td>

                                    <div class="actions">

                                        <a
                                            href="{{ route('rooms.edit', $room) }}"
                                            class="edit-btn"
                                        >
                                            ✏️ Edit
                                        </a>


                                        <form
                                            action="{{ route('rooms.destroy', $room) }}"
                                            method="POST"
                                            style="display:inline;"
                                            onsubmit="return confirm('Are you sure you want to delete this room?')"
                                        >

                                            @csrf

                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="delete-btn"
                                            >
                                                🗑️ Delete
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>


                        @empty

                            <tr>

                                <td
                                    colspan="7"
                                    class="empty-state"
                                >

                                    <div class="empty-icon">
                                        🏠
                                    </div>

                                    <div class="empty-title">
                                        No rooms found
                                    </div>

                                    <div class="empty-text">
                                        Add your first hostel room to get started.
                                    </div>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</x-app-layout>