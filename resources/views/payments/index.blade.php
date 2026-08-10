
<x-app-layout>

    <style>
        .payments-page {
            min-height: calc(100vh - 64px);
            background: #f5f7fb;
            padding: 40px 20px;
        }

        .payments-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .payments-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            gap: 20px;
        }

        .payments-title {
            margin: 0;
            font-size: 30px;
            font-weight: 700;
            color: #172033;
        }

        .payments-subtitle {
            margin: 7px 0 0;
            color: #718096;
            font-size: 14px;
        }

        .add-payment-btn {
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

        .add-payment-btn:hover {
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

        .payments-card {
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

        .payments-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 950px;
        }

        .payments-table th {
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

        .payments-table td {
            padding: 15px 16px;
            border-bottom: 1px solid #eef0f3;
            color: #374151;
            font-size: 14px;
            vertical-align: middle;
        }

        .payments-table tbody tr {
            transition: background 0.15s ease;
        }

        .payments-table tbody tr:hover {
            background: #f8fafc;
        }

        .payments-table tbody tr:last-child td {
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
        }

        .amount {
            font-weight: 700;
            color: #172033;
            white-space: nowrap;
        }

        .month-text {
            color: #475569;
            font-weight: 500;
        }

        .date-text {
            color: #64748b;
            white-space: nowrap;
        }

        .method-badge {
            display: inline-block;
            background: #f3f4f6;
            color: #374151;
            padding: 5px 9px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
            white-space: nowrap;
        }

        .status-badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
        }

        .status-paid {
            background: #dcfce7;
            color: #166534;
        }

        .status-pending {
            background: #fef3c7;
            color: #92400e;
        }

        .status-overdue {
            background: #fee2e2;
            color: #991b1b;
        }

        .status-default {
            background: #f3f4f6;
            color: #4b5563;
        }

        .actions {
            display: flex;
            align-items: center;
            gap: 8px;
            white-space: nowrap;
        }

        .edit-btn {
            display: inline-flex;
            align-items: center;
            padding: 6px 10px;
            background: #eff6ff;
            color: #2563eb;
            border: 1px solid #dbeafe;
            border-radius: 6px;
            text-decoration: none;
            font-size: 12px;
            font-weight: 600;
            transition: 0.2s;
        }

        .edit-btn:hover {
            background: #dbeafe;
        }

        .delete-btn {
            display: inline-flex;
            align-items: center;
            padding: 6px 10px;
            background: #fef2f2;
            color: #dc2626;
            border: 1px solid #fee2e2;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s;
        }

        .delete-btn:hover {
            background: #fee2e2;
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

            .payments-page {
                padding: 25px 15px;
            }

            .payments-header {
                flex-direction: column;
                align-items: stretch;
            }

            .payments-title {
                font-size: 25px;
            }

            .add-payment-btn {
                justify-content: center;
            }

            .payments-card {
                border-radius: 10px;
            }
        }
    </style>


    <div class="payments-page">

        <div class="payments-container">


            <!-- Header -->

            <div class="payments-header">

                <div>

                    <h1 class="payments-title">
                        💰 Payments
                    </h1>

                    <p class="payments-subtitle">
                        Manage resident payments, payment methods and payment status.
                    </p>

                </div>


                <a
                    href="{{ route('payments.create') }}"
                    class="add-payment-btn"
                >
                    + Add Payment
                </a>

            </div>


            <!-- Success Message -->

            @if(session('success'))

                <div class="success-box">
                    ✓ {{ session('success') }}
                </div>

            @endif


            <!-- Payments Table -->

            <div class="payments-card">

                <div class="table-wrapper">

                    <table class="payments-table">

                        <thead>

                            <tr>

                                <th>Resident</th>
                                <th>Room</th>
                                <th>Amount</th>
                                <th>Month</th>
                                <th>Payment Date</th>
                                <th>Method</th>
                                <th>Status</th>
                                <th>Actions</th>

                            </tr>

                        </thead>


                        <tbody>

                            @forelse($payments as $payment)

                                <tr>

                                    <!-- Resident -->

                                    <td>

                                        <span class="resident-name">
                                            {{ $payment->resident->name }}
                                        </span>

                                    </td>


                                    <!-- Room -->

                                    <td>

                                        @if($payment->resident->room?->room_number)

                                            <span class="room-badge">
                                                🏠 Room {{ $payment->resident->room->room_number }}
                                            </span>

                                        @else

                                            <span style="color:#9ca3af;">
                                                N/A
                                            </span>

                                        @endif

                                    </td>


                                    <!-- Amount -->

                                    <td>

                                        <span class="amount">
                                            Rs. {{ number_format($payment->amount, 2) }}
                                        </span>

                                    </td>


                                    <!-- Month -->

                                    <td>

                                        <span class="month-text">
                                            {{ $payment->month }}
                                        </span>

                                    </td>


                                    <!-- Payment Date -->

                                    <td>

                                        <span class="date-text">
                                            {{ $payment->payment_date ?? 'N/A' }}
                                        </span>

                                    </td>


                                    <!-- Payment Method -->

                                    <td>

                                        @if($payment->payment_method)

                                            <span class="method-badge">
                                                {{ ucfirst(str_replace('_', ' ', $payment->payment_method)) }}
                                            </span>

                                        @else

                                            <span style="color:#9ca3af;">
                                                N/A
                                            </span>

                                        @endif

                                    </td>


                                    <!-- Status -->

                                    <td>

                                        @php
                                            $status = strtolower($payment->status ?? '');
                                        @endphp

                                        <span
                                            class="status-badge
                                            {{ $status === 'paid'
                                                ? 'status-paid'
                                                : ($status === 'pending'
                                                    ? 'status-pending'
                                                    : ($status === 'overdue'
                                                        ? 'status-overdue'
                                                        : 'status-default')) }}"
                                        >
                                            {{ ucfirst($payment->status) }}
                                        </span>

                                    </td>


                                    <!-- Actions -->

                                    <td>

                                        <div class="actions">

                                            <a
                                                href="{{ route('payments.edit', $payment->id) }}"
                                                class="edit-btn"
                                            >
                                                ✏️ Edit
                                            </a>


                                            <form
                                                action="{{ route('payments.destroy', $payment->id) }}"
                                                method="POST"
                                                style="display:inline;"
                                                onsubmit="return confirm('Are you sure you want to delete this payment?');"
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
                                        colspan="8"
                                        class="empty-state"
                                    >

                                        <div class="empty-icon">
                                            💰
                                        </div>

                                        <div class="empty-title">
                                            No payments found
                                        </div>

                                        <div class="empty-text">
                                            Add a payment to see it listed here.
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
