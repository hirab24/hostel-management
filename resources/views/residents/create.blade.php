<x-app-layout>

    <style>
        .resident-form-page {
            min-height: calc(100vh - 64px);
            background: #f5f7fb;
            padding: 40px 20px;
        }

        .resident-form-container {
            max-width: 850px;
            margin: 0 auto;
        }

        /* Header */

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


        /* Card */

        .form-card {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            padding: 30px;
            box-shadow: 0 5px 20px rgba(15, 23, 42, 0.06);
        }


        /* Errors */

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


        /* Section */

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


        /* Grid */

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .full-width {
            grid-column: 1 / -1;
        }


        /* Labels */

        .form-label {
            font-size: 13px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 8px;
        }

        .required {
            color: #dc2626;
        }


        /* Inputs */

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

        .form-input::placeholder {
            color: #9ca3af;
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


        /* Helper */

        .input-help {
            margin-top: 6px;
            color: #9ca3af;
            font-size: 12px;
        }


        /* Room */

        .room-select {
            background: #f8fbff;
        }


        /* Buttons */

        .form-actions {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-top: 5px;
            padding-top: 24px;
            border-top: 1px solid #eef0f3;
        }

        .save-btn {
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

        .save-btn:hover {
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


        /* Responsive */

        @media (max-width: 700px) {

            .resident-form-page {
                padding: 25px 15px;
            }

            .form-card {
                padding: 22px;
            }

            .form-grid {
                grid-template-columns: 1fr;
                gap: 18px;
            }

            .full-width {
                grid-column: auto;
            }

            .form-title {
                font-size: 25px;
            }

            .form-actions {
                flex-direction: column;
                align-items: stretch;
            }

            .save-btn,
            .cancel-btn {
                justify-content: center;
                width: 100%;
                box-sizing: border-box;
            }
        }
    </style>


    <div class="resident-form-page">

        <div class="resident-form-container">


            <!-- Header -->

            <div class="form-header">

                <h1 class="form-title">
                    👨‍🎓 Add Resident
                </h1>

                <p class="form-subtitle">
                    Add a new resident and assign them to a hostel room.
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
                    action="{{ route('residents.store') }}"
                    method="POST"
                >

                    @csrf


                    <!-- Personal Information -->

                    <div class="form-section">

                        <div class="section-title">
                            👤 Personal Information
                        </div>


                        <div class="form-grid">


                            <!-- Full Name -->

                            <div class="form-group">

                                <label class="form-label">
                                    👤 Full Name
                                    <span class="required">*</span>
                                </label>

                                <input
                                    type="text"
                                    name="name"
                                    value="{{ old('name') }}"
                                    placeholder="Enter resident's full name"
                                    class="form-input"
                                >

                            </div>


                            <!-- Email -->

                            <div class="form-group">

                                <label class="form-label">
                                    📧 Email
                                </label>

                                <input
                                    type="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    placeholder="example@email.com"
                                    class="form-input"
                                >

                            </div>


                            <!-- Phone -->

                            <div class="form-group">

                                <label class="form-label">
                                    📱 Phone
                                    <span class="required">*</span>
                                </label>

                                <input
                                    type="text"
                                    name="phone"
                                    value="{{ old('phone') }}"
                                    placeholder="03XX-XXXXXXX"
                                    class="form-input"
                                >

                            </div>


                            <!-- CNIC -->

                            <div class="form-group">

                                <label class="form-label">
                                    🪪 CNIC
                                    <span class="required">*</span>
                                </label>

                                <input
                                    type="text"
                                    name="cnic"
                                    value="{{ old('cnic') }}"
                                    placeholder="xxxxx-xxxxxxx-x"
                                    class="form-input"
                                >

                                <span class="input-help">
                                    Enter CNIC in the format 35202-1234567-1.
                                </span>

                            </div>


                        </div>

                    </div>


                    <!-- Guardian Information -->

                    <div class="form-section">

                        <div class="section-title">
                            👨‍👩‍👦 Guardian Information
                        </div>


                        <div class="form-grid">


                            <!-- Guardian Name -->

                            <div class="form-group">

                                <label class="form-label">
                                    👤 Guardian Name
                                    <span class="required">*</span>
                                </label>

                                <input
                                    type="text"
                                    name="guardian_name"
                                    value="{{ old('guardian_name') }}"
                                    placeholder="Enter guardian name"
                                    class="form-input"
                                >

                            </div>


                            <!-- Guardian Phone -->

                            <div class="form-group">

                                <label class="form-label">
                                    📞 Guardian Phone
                                    <span class="required">*</span>
                                </label>

                                <input
                                    type="text"
                                    name="guardian_phone"
                                    value="{{ old('guardian_phone') }}"
                                    placeholder="03XX-XXXXXXX"
                                    class="form-input"
                                >

                            </div>


                        </div>

                    </div>


                    <!-- Hostel Information -->

                    <div class="form-section">

                        <div class="section-title">
                            🏠 Hostel Information
                        </div>


                        <div class="form-grid">


                            <!-- Room -->

                            <div class="form-group">

                                <label class="form-label">
                                    🏠 Room
                                    <span class="required">*</span>
                                </label>

                                <select
                                    name="room_id"
                                    class="form-select room-select"
                                >

                                    <option value="">
                                        Select Room
                                    </option>


                                    @foreach($rooms as $room)

                                        <option
                                            value="{{ $room->id }}"
                                            {{ old('room_id') == $room->id ? 'selected' : '' }}
                                        >
                                            🛏️ Room {{ $room->room_number }}
                                            — {{ $room->available_beds }} beds available
                                        </option>

                                    @endforeach

                                </select>

                                <span class="input-help">
                                    Select a room with an available bed.
                                </span>

                            </div>


                            <!-- Check-in Date -->

                            <div class="form-group">

                                <label class="form-label">
                                    📅 Check-in Date
                                    <span class="required">*</span>
                                </label>

                                <input
                                    type="date"
                                    name="check_in_date"
                                    value="{{ old('check_in_date') }}"
                                    class="form-input"
                                >

                                <span class="input-help">
                                    Date when the resident moves into the hostel.
                                </span>

                            </div>


                            <!-- Monthly Fee -->

                            <div class="form-group">

                                <label class="form-label">
                                    💰 Monthly Fee
                                    <span class="required">*</span>
                                </label>

                                <input
                                    type="number"
                                    name="monthly_fee"
                                    value="{{ old('monthly_fee') }}"
                                    min="0"
                                    step="0.01"
                                    placeholder="Example: 15000"
                                    class="form-input"
                                >

                                <span class="input-help">
                                    Monthly hostel fee in PKR.
                                </span>

                            </div>


                        </div>

                    </div>


                    <!-- Actions -->

                    <div class="form-actions">

                        <button
                            type="submit"
                            class="save-btn"
                        >
                            💾 Save Resident
                        </button>


                        <a
                            href="{{ route('residents.index') }}"
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