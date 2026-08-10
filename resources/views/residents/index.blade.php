<x-app-layout>

    <style>
        .residents-page {
            min-height: calc(100vh - 64px);
            background: #f5f7fb;
            padding: 35px;
        }

        .residents-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        /* Header */

        .residents-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 28px;
        }

        .residents-title {
            margin: 0;
            font-size: 30px;
            font-weight: 700;
            color: #172033;
        }

        .residents-subtitle {
            margin: 7px 0 0;
            color: #718096;
            font-size: 14px;
        }

        .add-resident-btn {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: #2563eb;
            color: white;
            padding: 11px 18px;
            text-decoration: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            box-shadow: 0 4px 10px rgba(37, 99, 235, .20);
            transition: .2s;
        }

        .add-resident-btn:hover {
            background: #1d4ed8;
            transform: translateY(-1px);
        }


        /* Success */

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

        .residents-table-card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            box-shadow: 0 4px 18px rgba(15, 23, 42, .05);
            overflow: hidden;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        .residents-table {
            width: 100%;
            min-width: 950px;
            border-collapse: collapse;
        }


        /* Table Header */

        .residents-table thead {
            background: #f8fafc;
        }

        .residents-table th {
            padding: 16px 18px;
            text-align: left;
            font-size: 13px;
            font-weight: 600;
            color: #64748b;
            border-bottom: 1px solid #e5e7eb;
            white-space: nowrap;
        }


        /* Table Body */

        .residents-table td {
            padding: 17px 18px;
            font-size: 14px;
            color: #475569;
            border-bottom: 1px solid #f1f5f9;
            white-space: nowrap;
        }

        .residents-table tbody tr {
            transition: background .2s ease;
        }

        .residents-table tbody tr:hover {
            background: #f8fbff;
        }

        .residents-table tbody tr:last-child td {
            border-bottom: none;
        }


        /* Resident Name */

        .resident-name {
            font-weight: 700;
            color: #1e293b;
        }


        /* Phone */

        .phone-number {
            color: #475569;
        }


        /* CNIC */

        .cnic-number {
            font-family: monospace;
            color: #475569;
        }


        /* Room */

        .room-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 6px 10px;
            background: #eff6ff;
            color: #2563eb;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .not-assigned {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 6px 10px;
            background: #f1f5f9;
            color: #64748b;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }


        /* Fee */

        .monthly-fee {
            font-weight: 700;
            color: #1e293b;
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

        .status-active {
            background: #dcfce7;
            color: #15803d;
        }

        .status-inactive {
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
            transition: .2s;
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
            transition: .2s;
        }

        .delete-btn:hover {
            background: #fee2e2;
            color: #b91c1c;
        }


        /* Empty */

        .empty-state {
            text-align: center;
            padding: 55px 20px !important;
        }

        .empty-icon {
            font-size: 40px;
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

            .residents-page {
                padding: 20px;
            }

            .residents-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .residents-title {
                font-size: 25px;
            }

            .add-resident-btn {
                width: 100%;
                justify-content: center;
                box-sizing: border-box;
            }
        }
    </style>


    <div class="residents-page">

        <div class="residents-container">


            <!-- Header -->

            <div class="residents-header">

                <div>

                    <h1 class="residents-title">
                        👨‍🎓 Residents
                    </h1>

                    <p class="residents-subtitle">
                        Manage hostel residents, rooms and monthly fees
                    </p>

                </div>


                <a
                    href="{{ route('residents.create') }}"
                    class="add-resident-btn"
                >
                    ➕ Add Resident
                </a>

            </div>


            <!-- Success Message -->

            @if(session('success'))

                <div class="success-message">
                    ✅ {{ session('success') }}
                </div>

            @endif


            <!-- Table -->

            <div class="residents-table-card">

                <div class="table-wrapper">

                    <table class="residents-table">

                        <thead>

                            <tr>

                                <th>👤 Name</th>

                                <th>📱 Phone</th>

                                <th>🪪 CNIC</th>

                                <th>🏠 Room</th>

                                <th>💰 Monthly Fee</th>

                                <th>📌 Status</th>

                                <th>⚙️ Actions</th>

                            </tr>

                        </thead>


                        <tbody>

                            @forelse($residents as $resident)

                                <tr>


                                    <!-- Name -->

                                    <td class="resident-name">
                                        {{ $resident->name }}
                                    </td>


                                    <!-- Phone -->

                                    <td class="phone-number">
                                        📞 {{ $resident->phone }}
                                    </td>


                                    <!-- CNIC -->

                                    <td class="cnic-number">
                                        {{ $resident->cnic }}
                                    </td>


                                    <!-- Room -->

                                    <td>

                                        @if($resident->room)

                                            <span class="room-badge">
                                                🏠 Room {{ $resident->room->room_number }}
                                            </span>

                                        @else

                                            <span class="not-assigned">
                                                ⚪ Not Assigned
                                            </span>

                                        @endif

                                    </td>


                                    <!-- Monthly Fee -->

                                    <td class="monthly-fee">
                                        Rs. {{ number_format($resident->monthly_fee, 2) }}
                                    </td>


                                    <!-- Status -->

                                    <td>

                                        @if($resident->status === 'active')

                                            <span class="status-badge status-active">
                                                🟢 Active
                                            </span>

                                        @elseif($resident->status === 'inactive')

                                            <span class="status-badge status-inactive">
                                                🔴 Inactive
                                            </span>

                                        @else

                                            <span class="status-badge status-other">
                                                🟡 {{ ucfirst($resident->status) }}
                                            </span>

                                        @endif

                                    </td>


                                    <!-- Actions -->

                                    <td>

                                        <div class="actions">


                                            <a
                                                href="{{ route('residents.edit', $resident->id) }}"
                                                class="edit-btn"
                                            >
                                                ✏️ Edit
                                            </a>


                                            <form
                                                action="{{ route('residents.destroy', $resident->id) }}"
                                                method="POST"
                                                style="display:inline;"
                                                onsubmit="return confirm('Are you sure you want to delete this resident?')"
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
                                            👨‍🎓
                                        </div>

                                        <div class="empty-title">
                                            No residents found
                                        </div>

                                        <div class="empty-text">
                                            Add your first hostel resident to get started.
                                        </div>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>