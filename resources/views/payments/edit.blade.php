```blade
<x-app-layout>

    <style>
        .payment-form-page {
            min-height: calc(100vh - 64px);
            background: #f5f7fb;
            padding: 40px 20px;
        }

        .payment-form-container {
            max-width: 850px;
            margin: 0 auto;
        }

        .form-header {
            margin-bottom: 25px;
        }

        .form-title {
            margin: 0;
            font-size: 30px;
            font-weight: 700;
            color: #172033;
        }

        .form-subtitle {
            margin: 7px 0 0;
            color: #718096;
            font-size: 14px;
        }

        .form-card {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            padding: 30px;
            box-shadow: 0 5px 20px rgba(15, 23, 42, 0.06);
        }

        .error-box {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #991b1b;
            padding: 15px 18px;
            border-radius: 9px;
            margin-bottom: 25px;
        }

        .error-title {
            font-weight: 600;
            margin-bottom: 7px;
        }

        .error-list {
            margin: 0;
            padding-left: 20px;
            font-size: 13px;
        }

        .error-list li {
            margin-bottom: 3px;
        }

        .form-section {
            margin-bottom: 30px;
        }

        .section-title {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 16px;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 18px;
            padding-bottom: 10px;
            border-bottom: 1px solid #eef0f3;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-label {
            font-size: 13px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 8px;
        }

        .required {
            color: #dc2626;
        }

        .form-input,
        .form-select {
            width: 100%;
            box-sizing: border-box;
            padding: 11px 13px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            background: #ffffff;
            color: #1f2937;
            font-size: 14px;
            outline: none;
            transition: all 0.2s ease;
        }

        .form-input:hover,
        .form-select:hover {
            border-color: #9ca3af;
        }

        .form-input:focus,
        .form-select:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.10);
        }

        .form-input::placeholder {
            color: #9ca3af;
        }

        .resident-select {
            background: #f8fbff;
        }

        .method-select {
            background: #f8fbff;
        }

        .status-select {
            background: #fffdf5;
        }

        .input-help {
            margin-top: 6px;
            color: #9ca3af;
            font-size: 12px;
        }

        .form-actions {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-top: 5px;
            padding-top: 24px;
            border-top: 1px solid #eef0f3;
        }

        .update-btn {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: #2563eb;
            color: #ffffff;
            border: none;
            padding: 11px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.2s ease;
        }

        .update-btn:hover {
            background: #1d4ed8;
            transform: translateY(-1px);
            box-shadow: 0 5px 12px rgba(37, 99, 235, 0.20);
        }

        .cancel-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: #4b5563;
            background: #f3f4f6;
            border: 1px solid #e5e7eb;
            padding: 10px 18px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            transition: 0.2s;
        }

        .cancel-btn:hover {
            background: #e5e7eb;
            color: #1f2937;
        }

        @media (max-width: 700px) {

            .payment-form-page {
                padding: 25px 15px;
            }

            .form-card {
                padding: 22px;
            }

            .form-grid {
                grid-template-columns: 1fr;
                gap: 18px;
            }

            .form-title {
                font-size: 25px;
            }

            .form-actions {
                flex-direction: column;
                align-items: stretch;
            }

            .update-btn,
            .cancel-btn {
                justify-content: center;
                width: 100%;
                box-sizing: border-box;
            }
        }
    </style>


    <div class="payment-form-page">

        <div class="payment-form-container">


            <!-- Header -->

            <div class="form-header">

                <h1 class="form-title">
                    ✏️ Edit Payment
                </h1>

                <p class="form-subtitle">
                    Update resident payment information, method and status.
                </p>

            </div>


            <!-- Form Card -->

            <div class="form-card">


                <!-- Validation Errors -->

                @if ($errors->any())

                    <div class="error-box">

                        <div class="error-title">
                            ⚠️ Please fix the following errors:
                        </div>

                        <ul class="error-list">

                            @foreach ($errors->all() as $error)

                                <li>
                                    {{ $error }}
                                </li>

                            @endforeach

                        </ul>

                    </div>

                @endif


                <form
                    action="{{ route('payments.update', $payment) }}"
                    method="POST"
                >

                    @csrf

                    @method('PUT')


                    <!-- Payment Information -->

                    <div class="form-section">

                        <div class="section-title">
                            💳 Payment Information
                        </div>


                        <div class="form-grid">


                            <!-- Resident -->

                            <div class="form-group">

                                <label class="form-label">
                                    👤 Resident
                                    <span class="required">*</span>
                                </label>

                                <select
                                    name="resident_id"
                                    class="form-select resident-select"
                                >

                                    @foreach($residents as $resident)

                                        <option
                                            value="{{ $resident->id }}"
                                            {{ old('resident_id', $payment->resident_id) == $resident->id ? 'selected' : '' }}
                                        >
                                            {{ $resident->name }}
                                            — Room {{ $resident->room?->room_number ?? 'N/A' }}
                                        </option>

                                    @endforeach

                                </select>

                                <span class="input-help">
                                    Select the resident associated with this payment.
                                </span>

                            </div>


                            <!-- Amount -->

                            <div class="form-group">

                                <label class="form-label">
                                    💰 Amount
                                    <span class="required">*</span>
                                </label>

                                <input
                                    type="number"
                                    name="amount"
                                    value="{{ old('amount', $payment->amount) }}"
                                    min="0"
                                    step="0.01"
                                    placeholder="Example: 18000"
                                    class="form-input"
                                >

                                <span class="input-help">
                                    Payment amount in PKR.
                                </span>

                            </div>


                            <!-- Month -->

                            <div class="form-group">

                                <label class="form-label">
                                    📅 Month
                                    <span class="required">*</span>
                                </label>

                                <input
                                    type="text"
                                    name="month"
                                    value="{{ old('month', $payment->month) }}"
                                    placeholder="Example: August 2026"
                                    class="form-input"
                                >

                                <span class="input-help">
                                    Month this payment covers.
                                </span>

                            </div>


                            <!-- Payment Date -->

                            <div class="form-group">

                                <label class="form-label">
                                    📆 Payment Date
                                </label>

                                <input
                                    type="date"
                                    name="payment_date"
                                    value="{{ old('payment_date', $payment->payment_date) }}"
                                    class="form-input"
                                >

                                <span class="input-help">
                                    Date when the payment was received.
                                </span>

                            </div>


                            <!-- Payment Method -->

                            <div class="form-group">

                                <label class="form-label">
                                    💳 Payment Method
                                </label>

                                <select
                                    name="payment_method"
                                    class="form-select method-select"
                                >

                                    <option
                                        value="cash"
                                        {{ old('payment_method', $payment->payment_method) == 'cash' ? 'selected' : '' }}
                                    >
                                        💵 Cash
                                    </option>

                                    <option
                                        value="bank_transfer"
                                        {{ old('payment_method', $payment->payment_method) == 'bank_transfer' ? 'selected' : '' }}
                                    >
                                        🏦 Bank Transfer
                                    </option>

                                    <option
                                        value="online"
                                        {{ old('payment_method', $payment->payment_method) == 'online' ? 'selected' : '' }}
                                    >
                                        🌐 Online
                                    </option>

                                </select>

                            </div>


                            <!-- Status -->

                            <div class="form-group">

                                <label class="form-label">
                                    📌 Status
                                    <span class="required">*</span>
                                </label>

                                <select
                                    name="status"
                                    class="form-select status-select"
                                >

                                    <option
                                        value="paid"
                                        {{ old('status', $payment->status) == 'paid' ? 'selected' : '' }}
                                    >
                                        🟢 Paid
                                    </option>

                                    <option
                                        value="pending"
                                        {{ old('status', $payment->status) == 'pending' ? 'selected' : '' }}
                                    >
                                        🟡 Pending
                                    </option>

                                </select>

                                <span class="input-help">
                                    Select the current payment status.
                                </span>

                            </div>


                        </div>

                    </div>


                    <!-- Actions -->

                    <div class="form-actions">

                        <button
                            type="submit"
                            class="update-btn"
                        >
                            💾 Update Payment
                        </button>


                        <a
                            href="{{ route('payments.index') }}"
                            class="cancel-btn"
                        >
                            ← Cancel
                        </a>

                    </div>


                </form>

            </div>

        </div>

    </div>

</x-app-layout>
```
