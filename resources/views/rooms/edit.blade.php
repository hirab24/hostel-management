<x-app-layout>

    <style>
        .room-form-page {
            min-height: calc(100vh - 64px);
            background: #f5f7fb;
            padding: 40px 20px;
        }

        .room-form-container {
            max-width: 760px;
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


        /* Form Card */

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


        /* Grid */

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 22px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
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


        /* Current Room Info */

        .current-room {
            background: #eff6ff;
            border: 1px solid #bfdbfe;
            color: #1e40af;
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 22px;
            font-size: 13px;
        }


        /* Buttons */

        .form-actions {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-top: 28px;
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


        /* Responsive */

        @media (max-width: 650px) {

            .room-form-page {
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


    <div class="room-form-page">

        <div class="room-form-container">


            <!-- Header -->

            <div class="form-header">

                <h1 class="form-title">
                    ✏️ Edit Room
                </h1>

                <p class="form-subtitle">
                    Update room information and availability settings.
                </p>

            </div>


            <!-- Form Card -->

            <div class="form-card">


                <!-- Current Room -->

                <div class="current-room">
                    🏠 You are editing
                    <strong>Room {{ $room->room_number }}</strong>
                </div>


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


                <!-- Form -->

                <form
                    action="{{ route('rooms.update', $room) }}"
                    method="POST"
                >

                    @csrf

                    @method('PUT')


                    <div class="form-grid">


                        <!-- Room Number -->

                        <div class="form-group">

                            <label class="form-label">
                                🏠 Room Number
                                <span class="required">*</span>
                            </label>

                            <input
                                type="text"
                                name="room_number"
                                value="{{ old('room_number', $room->room_number) }}"
                                placeholder="Example: 101"
                                class="form-input"
                            >

                            <span class="input-help">
                                Enter the unique room number.
                            </span>

                        </div>


                        <!-- Floor -->

                        <div class="form-group">

                            <label class="form-label">
                                🏢 Floor
                                <span class="required">*</span>
                            </label>

                            <input
                                type="number"
                                name="floor"
                                value="{{ old('floor', $room->floor) }}"
                                min="0"
                                placeholder="Example: 1"
                                class="form-input"
                            >

                            <span class="input-help">
                                Enter the floor number.
                            </span>

                        </div>


                        <!-- Capacity -->

                        <div class="form-group">

                            <label class="form-label">
                                👥 Room Capacity
                                <span class="required">*</span>
                            </label>

                            <input
                                type="number"
                                name="capacity"
                                value="{{ old('capacity', $room->capacity) }}"
                                min="1"
                                placeholder="Example: 4"
                                class="form-input"
                            >

                            <span class="input-help">
                                Maximum number of residents.
                            </span>

                        </div>


                        <!-- Available Beds -->

                        <div class="form-group">

                            <label class="form-label">
                                🛏️ Available Beds
                                <span class="required">*</span>
                            </label>

                            <input
                                type="number"
                                name="available_beds"
                                value="{{ old('available_beds', $room->available_beds) }}"
                                min="0"
                                placeholder="Example: 4"
                                class="form-input"
                            >

                            <span class="input-help">
                                Number of currently available beds.
                            </span>

                        </div>


                        <!-- Monthly Rent -->

                        <div class="form-group">

                            <label class="form-label">
                                💰 Monthly Rent
                                <span class="required">*</span>
                            </label>

                            <input
                                type="number"
                                name="monthly_rent"
                                value="{{ old('monthly_rent', $room->monthly_rent) }}"
                                min="0"
                                step="0.01"
                                placeholder="Example: 15000"
                                class="form-input"
                            >

                            <span class="input-help">
                                Monthly rent amount in PKR.
                            </span>

                        </div>


                        <!-- Status -->

                        <div class="form-group">

                            <label class="form-label">
                                📌 Status
                                <span class="required">*</span>
                            </label>

                            <select
                                name="status"
                                class="form-select"
                            >

                                <option
                                    value="available"
                                    {{ old('status', $room->status) == 'available' ? 'selected' : '' }}
                                >
                                    🟢 Available
                                </option>

                                <option
                                    value="full"
                                    {{ old('status', $room->status) == 'full' ? 'selected' : '' }}
                                >
                                    🔴 Full
                                </option>

                                <option
                                    value="maintenance"
                                    {{ old('status', $room->status) == 'maintenance' ? 'selected' : '' }}
                                >
                                    🟡 Maintenance
                                </option>

                            </select>

                            <span class="input-help">
                                Current room availability status.
                            </span>

                        </div>


                    </div>


                    <!-- Actions -->

                    <div class="form-actions">

                        <button
                            type="submit"
                            class="update-btn"
                        >
                            💾 Update Room
                        </button>


                        <a
                            href="{{ route('rooms.index') }}"
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