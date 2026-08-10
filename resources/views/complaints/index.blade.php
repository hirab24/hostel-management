
<x-app-layout>

    <style>
        .complaints-page {
            min-height: calc(100vh - 64px);
            background: #f5f7fb;
            padding: 40px 20px;
        }

        .complaints-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .complaints-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            gap: 20px;
        }

        .complaints-title {
            margin: 0;
            font-size: 30px;
            font-weight: 700;
            color: #172033;
        }

        .complaints-subtitle {
            margin: 7px 0 0;
            color: #718096;
            font-size: 14px;
        }

        .add-complaint-btn {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: #2563eb;
            color: #ffffff;
            padding: 11px 18px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.2s ease;
            white-space: nowrap;
        }

        .add-complaint-btn:hover {
            background: #1d4ed8;
            transform: translateY(-1px);
            box-shadow: 0 5px 12px rgba(37, 99, 235, 0.20);
        }

        .success-box {
            background: #ecfdf5;
            border: 1px solid #a7f3d0;
            color: #065f46;
            padding: 13px 16px;
            border-radius: 9px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .complaints-card {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(15, 23, 42, 0.06);
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        .complaints-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 950px;
        }

        .complaints-table th {
            background: #f8fafc;
            color: #475569;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.03em;
            padding: 15px 16px;
            text-align: left;
            border-bottom: 1px solid #e5e7eb;
            white-space: nowrap;
        }

        .complaints-table td {
            padding: 15px 16px;
            border-bottom: 1px solid #eef0f3;
            color: #374151;
            font-size: 14px;
            vertical-align: middle;
        }

        .complaints-table tbody tr {
            transition: background 0.15s ease;
        }

        .complaints-table tbody tr:hover {
            background: #f8fafc;
        }

        .complaints-table tbody tr:last-child td {
            border-bottom: none;
        }

        .resident-name {
            font-weight: 600;
            color: #172033;
        }

        .room-badge {
            display: inline-block;
            background: #eff6ff;
            color: #1d4ed8;
            padding: 5px 9px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
            white-space: nowrap;
        }

        .subject-text {
            font-weight: 600;
            color: #374151;
        }

        .priority-badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
        }

        .priority-low {
            background: #f0fdf4;
            color: #166534;
        }

        .priority-medium {
            background: #fefce8;
            color: #854d0e;
        }

        .priority-high {
            background: #fff7ed;
            color: #c2410c;
        }

        .priority-urgent {
            background: #fef2f2;
            color: #991b1b;
        }

        .priority-default {
            background: #f3f4f6;
            color: #4b5563;
        }

        .status-badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
        }

        .status-pending {
            background: #fef3c7;
            color: #92400e;
        }

        .status-progress {
            background: #dbeafe;
            color: #1e40af;
        }

        .status-resolved {
            background: #dcfce7;
            color: #166534;
        }

        .status-default {
            background: #f3f4f6;
            color: #4b5563;
        }

        .date-text {
            color: #64748b;
            white-space: nowrap;
        }

        .status-form {
            margin: 0;
        }

        .status-select {
            min-width: 125px;
            padding: 7px 10px;
            border: 1px solid #d1d5db;
            border-radius: 7px;
            background: #ffffff;
            color: #374151;
            font-size: 12px;
            font-weight: 600;
            outline: none;
            cursor: pointer;
            transition: 0.2s;
        }

        .status-select:hover {
            border-color: #9ca3af;
        }

        .status-select:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.10);
        }

        .empty-state {
            padding: 50px 20px !important;
            text-align: center;
            color: #64748b;
        }

        .empty-icon {
            font-size: 35px;
            margin-bottom: 10px;
        }

        .empty-title {
            color: #374151;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .empty-text {
            color: #9ca3af;
            font-size: 13px;
        }

        @media (max-width: 700px) {

            .complaints-page {
                padding: 25px 15px;
            }

            .complaints-header {
                flex-direction: column;
                align-items: stretch;
            }

            .complaints-title {
                font-size: 25px;
            }

            .add-complaint-btn {
                justify-content: center;
            }

            .complaints-card {
                border-radius: 10px;
            }
        }
    </style>


    <div class="complaints-page">

        <div class="complaints-container">


            <!-- Header -->

            <div class="complaints-header">

                <div>

                    <h1 class="complaints-title">
                        📢 Complaints
                    </h1>

                    <p class="complaints-subtitle">
                        Manage resident complaints, priorities and resolution status.
                    </p>

                </div>


                <a
                    href="{{ route('complaints.create') }}"
                    class="add-complaint-btn"
                >
                    + Submit Complaint
                </a>

            </div>


            <!-- Success Message -->

            @if(session('success'))

                <div class="success-box">
                    ✓ {{ session('success') }}
                </div>

            @endif


            <!-- Complaints Table -->

            <div class="complaints-card">

                <div class="table-wrapper">

                    <table class="complaints-table">

                        <thead>

                            <tr>

                                <th>Resident</th>
                                <th>Room</th>
                                <th>Subject</th>
                                <th>Priority</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Actions</th>

                            </tr>

                        </thead>


                        <tbody>

                            @forelse($complaints as $complaint)

                                @php

                                    $priority = strtolower($complaint->priority ?? '');

                                    $status = strtolower($complaint->status ?? '');

                                @endphp


                                <tr>


                                    <!-- Resident -->

                                    <td>

                                        <span class="resident-name">
                                            {{ $complaint->resident->name }}
                                        </span>

                                    </td>


                                    <!-- Room -->

                                    <td>

                                        @if($complaint->resident->room?->room_number)

                                            <span class="room-badge">
                                                🏠 Room {{ $complaint->resident->room->room_number }}
                                            </span>

                                        @else

                                            <span style="color:#9ca3af;">
                                                N/A
                                            </span>

                                        @endif

                                    </td>


                                    <!-- Subject -->

                                    <td>

                                        <span class="subject-text">
                                            {{ $complaint->subject }}
                                        </span>

                                    </td>


                                    <!-- Priority -->

                                    <td>

                                        <span
                                            class="priority-badge
                                            {{ $priority === 'low'
                                                ? 'priority-low'
                                                : ($priority === 'medium'
                                                    ? 'priority-medium'
                                                    : ($priority === 'high'
                                                        ? 'priority-high'
                                                        : ($priority === 'urgent'
                                                            ? 'priority-urgent'
                                                            : 'priority-default'))) }}"
                                        >
                                            {{ ucfirst($complaint->priority) }}
                                        </span>

                                    </td>


                                    <!-- Status -->

                                    <td>

                                        <span
                                            class="status-badge
                                            {{ $status === 'pending'
                                                ? 'status-pending'
                                                : ($status === 'in_progress'
                                                    ? 'status-progress'
                                                    : ($status === 'resolved'
                                                        ? 'status-resolved'
                                                        : 'status-default')) }}"
                                        >
                                            {{ ucfirst(str_replace('_', ' ', $complaint->status)) }}
                                        </span>

                                    </td>


                                    <!-- Date -->

                                    <td>

                                        <span class="date-text">
                                            {{ $complaint->created_at->format('d M Y') }}
                                        </span>

                                    </td>


                                    <!-- Status Update -->

                                    <td>

                                        <form
                                            action="{{ route('complaints.update', $complaint->id) }}"
                                            method="POST"
                                            class="status-form"
                                        >

                                            @csrf

                                            @method('PUT')


                                            <select
                                                name="status"
                                                class="status-select"
                                                onchange="this.form.submit()"
                                            >

                                                <option
                                                    value="pending"
                                                    {{ $complaint->status == 'pending' ? 'selected' : '' }}
                                                >
                                                    Pending
                                                </option>

                                                <option
                                                    value="in_progress"
                                                    {{ $complaint->status == 'in_progress' ? 'selected' : '' }}
                                                >
                                                    In Progress
                                                </option>

                                                <option
                                                    value="resolved"
                                                    {{ $complaint->status == 'resolved' ? 'selected' : '' }}
                                                >
                                                    Resolved
                                                </option>

                                            </select>

                                        </form>

                                    </td>


                                </tr>


                            @empty

                                <tr>

                                    <td
                                        colspan="7"
                                        class="empty-state"
                                    >

                                        <div class="empty-icon">
                                            📢
                                        </div>

                                        <div class="empty-title">
                                            No complaints found
                                        </div>

                                        <div class="empty-text">
                                            Submitted complaints will appear here.
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
```
