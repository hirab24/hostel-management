<x-app-layout>

    <!-- Notification -->

    <div
        id="notification"
        style="
            position:fixed;
            top:25px;
            right:25px;
            width:360px;
            max-width:calc(100% - 40px);
            background:#ffffff;
            border-radius:14px;
            box-shadow:0 15px 40px rgba(15, 23, 42, 0.18);
            padding:20px;
            display:none;
            z-index:9999;
            border-left:5px solid #0f766e;
        "
    >

        <div style="
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:12px;
        ">

            <strong style="
                font-size:18px;
                color:#172033;
            ">
                🔔 New Complaint
            </strong>

            <button
                onclick="closeNotification()"
                style="
                    border:none;
                    background:#f1f5f9;
                    width:30px;
                    height:30px;
                    border-radius:50%;
                    font-size:20px;
                    cursor:pointer;
                    color:#475569;
                    line-height:1;
                "
            >
                ×
            </button>

        </div>

        <div
            id="notificationSubject"
            style="
                font-weight:700;
                color:#172033;
                font-size:16px;
                margin-bottom:7px;
            "
        ></div>

        <div
            id="notificationPriority"
            style="
                color:#64748b;
                font-size:14px;
            "
        ></div>

    </div>


    <!-- Dashboard -->

    <div style="
        padding:36px 40px;
        background:#f4f7fb;
        min-height:calc(100vh - 64px);
        box-sizing:border-box;
        font-family:Arial, sans-serif;
    ">


        <!-- Header -->

        <div style="
            margin-bottom:30px;
        ">

            <div style="
                display:flex;
                align-items:center;
                gap:14px;
            ">

                <div style="
                    width:48px;
                    height:48px;
                    background:#172033;
                    border-radius:13px;
                    display:flex;
                    align-items:center;
                    justify-content:center;
                    font-size:24px;
                    box-shadow:0 6px 15px rgba(23,32,51,0.15);
                ">
                    🏠
                </div>

                <div>

                    <h1 style="
                        font-size:28px;
                        font-weight:750;
                        color:#172033;
                        margin:0;
                        letter-spacing:-0.5px;
                    ">
                        Hostel Admin Dashboard
                    </h1>

                    <p style="
                        color:#64748b;
                        margin:4px 0 0 0;
                        font-size:14.5px;
                    ">
                        Overview of your hostel management system
                    </p>

                </div>

            </div>

        </div>


        <!-- Statistics -->

        <div class="stat-grid" style="
            display:grid;
            grid-template-columns:repeat(4, minmax(0, 1fr));
            gap:20px;
            margin-bottom:22px;
        ">


            <!-- Total Rooms -->

            <div class="stat-card" style="
                background:#ffffff;
                padding:22px;
                border-radius:16px;
                border:1px solid #e9edf3;
                box-shadow:0 4px 16px rgba(15,23,42,0.05);
                transition:transform 0.18s ease, box-shadow 0.18s ease;
                box-sizing:border-box;
            ">

                <div style="
                    display:flex;
                    justify-content:space-between;
                    align-items:flex-start;
                    margin-bottom:20px;
                ">

                    <div>

                        <p style="
                            color:#64748b;
                            font-size:13.5px;
                            font-weight:500;
                            margin:0 0 8px 0;
                        ">
                            Total Rooms
                        </p>

                        <h2 style="
                            font-size:30px;
                            font-weight:750;
                            color:#172033;
                            margin:0;
                        ">
                            {{ $totalRooms }}
                        </h2>

                    </div>

                    <div style="
                        width:46px;
                        height:46px;
                        border-radius:12px;
                        background:#e8f5f3;
                        display:flex;
                        align-items:center;
                        justify-content:center;
                        font-size:21px;
                    ">
                        🛏️
                    </div>

                </div>

                <div style="
                    height:4px;
                    width:40px;
                    background:#0f766e;
                    border-radius:10px;
                "></div>

            </div>


            <!-- Active Residents -->

            <div class="stat-card" style="
                background:#ffffff;
                padding:22px;
                border-radius:16px;
                border:1px solid #e9edf3;
                box-shadow:0 4px 16px rgba(15,23,42,0.05);
                transition:transform 0.18s ease, box-shadow 0.18s ease;
                box-sizing:border-box;
            ">

                <div style="
                    display:flex;
                    justify-content:space-between;
                    align-items:flex-start;
                    margin-bottom:20px;
                ">

                    <div>

                        <p style="
                            color:#64748b;
                            font-size:13.5px;
                            font-weight:500;
                            margin:0 0 8px 0;
                        ">
                            Active Residents
                        </p>

                        <h2 style="
                            font-size:30px;
                            font-weight:750;
                            color:#172033;
                            margin:0;
                        ">
                            {{ $totalResidents }}
                        </h2>

                    </div>

                    <div style="
                        width:46px;
                        height:46px;
                        border-radius:12px;
                        background:#eef2ff;
                        display:flex;
                        align-items:center;
                        justify-content:center;
                        font-size:21px;
                    ">
                        👥
                    </div>

                </div>

                <div style="
                    height:4px;
                    width:40px;
                    background:#4f46e5;
                    border-radius:10px;
                "></div>

            </div>


            <!-- Available Beds -->

            <div class="stat-card" style="
                background:#ffffff;
                padding:22px;
                border-radius:16px;
                border:1px solid #e9edf3;
                box-shadow:0 4px 16px rgba(15,23,42,0.05);
                transition:transform 0.18s ease, box-shadow 0.18s ease;
                box-sizing:border-box;
            ">

                <div style="
                    display:flex;
                    justify-content:space-between;
                    align-items:flex-start;
                    margin-bottom:20px;
                ">

                    <div>

                        <p style="
                            color:#64748b;
                            font-size:13.5px;
                            font-weight:500;
                            margin:0 0 8px 0;
                        ">
                            Available Beds
                        </p>

                        <h2 style="
                            font-size:30px;
                            font-weight:750;
                            color:#172033;
                            margin:0;
                        ">
                            {{ $availableBeds }}
                        </h2>

                    </div>

                    <div style="
                        width:46px;
                        height:46px;
                        border-radius:12px;
                        background:#fff7ed;
                        display:flex;
                        align-items:center;
                        justify-content:center;
                        font-size:21px;
                    ">
                        🛌
                    </div>

                </div>

                <div style="
                    height:4px;
                    width:40px;
                    background:#ea580c;
                    border-radius:10px;
                "></div>

            </div>


            <!-- Monthly Collection -->

            <div class="stat-card" style="
                background:#ffffff;
                padding:22px;
                border-radius:16px;
                border:1px solid #e9edf3;
                box-shadow:0 4px 16px rgba(15,23,42,0.05);
                transition:transform 0.18s ease, box-shadow 0.18s ease;
                box-sizing:border-box;
            ">

                <div style="
                    display:flex;
                    justify-content:space-between;
                    align-items:flex-start;
                    margin-bottom:20px;
                ">

                    <div style="
                        min-width:0;
                    ">

                        <p style="
                            color:#64748b;
                            font-size:13.5px;
                            font-weight:500;
                            margin:0 0 8px 0;
                        ">
                            This Month Collection
                        </p>

                        <h2 style="
                            font-size:22px;
                            font-weight:750;
                            color:#172033;
                            margin:0;
                            white-space:nowrap;
                        ">
                            Rs. {{ number_format($thisMonthCollection, 2) }}
                        </h2>

                    </div>

                    <div style="
                        width:46px;
                        height:46px;
                        min-width:46px;
                        border-radius:12px;
                        background:#ecfdf5;
                        display:flex;
                        align-items:center;
                        justify-content:center;
                        font-size:21px;
                    ">
                        💰
                    </div>

                </div>

                <div style="
                    height:4px;
                    width:40px;
                    background:#059669;
                    border-radius:10px;
                "></div>

            </div>

        </div>


        <!-- Bottom Section -->

        <div class="bottom-grid" style="
            display:grid;
            grid-template-columns:minmax(0, 1fr) minmax(280px, 360px);
            gap:20px;
            align-items:stretch;
        ">


            <!-- Dashboard Welcome Card -->

            <div style="
                background:linear-gradient(135deg, #172033 0%, #1c2740 100%);
                border-radius:16px;
                padding:28px;
                color:#ffffff;
                box-shadow:0 8px 25px rgba(15,23,42,0.14);
                position:relative;
                overflow:hidden;
                box-sizing:border-box;
            ">

                <div style="
                    position:relative;
                    z-index:2;
                ">

                    <div style="
                        font-size:12.5px;
                        font-weight:700;
                        color:#99f6e4;
                        margin-bottom:10px;
                        text-transform:uppercase;
                        letter-spacing:0.9px;
                    ">
                        Hostel Overview
                    </div>

                    <h2 style="
                        margin:0 0 9px 0;
                        font-size:23px;
                        font-weight:700;
                        color:#ffffff;
                    ">
                        Manage your hostel with ease
                    </h2>

                    <p style="
                        margin:0;
                        color:#cbd5e1;
                        font-size:14px;
                        line-height:1.7;
                        max-width:620px;
                    ">
                        Keep track of rooms, residents, payments and
                        complaints from one simple dashboard.
                    </p>

                </div>

                <div style="
                    position:absolute;
                    right:-30px;
                    bottom:-50px;
                    width:170px;
                    height:170px;
                    border-radius:50%;
                    border:35px solid rgba(20,184,166,0.14);
                "></div>

            </div>


            <!-- Pending Payments -->

            <div style="
                background:#ffffff;
                padding:24px;
                border-radius:16px;
                border:1px solid #e9edf3;
                box-shadow:0 4px 16px rgba(15,23,42,0.05);
                box-sizing:border-box;
            ">

                <div style="
                    display:flex;
                    align-items:center;
                    gap:13px;
                    margin-bottom:18px;
                ">

                    <div style="
                        width:44px;
                        height:44px;
                        border-radius:12px;
                        background:#fef2f2;
                        display:flex;
                        align-items:center;
                        justify-content:center;
                        font-size:20px;
                    ">
                        💳
                    </div>

                    <div>

                        <p style="
                            color:#64748b;
                            font-size:12.5px;
                            margin:0 0 3px 0;
                            font-weight:500;
                        ">
                            Pending Payments
                        </p>

                        <h2 style="
                            font-size:25px;
                            font-weight:750;
                            color:#172033;
                            margin:0;
                        ">
                            Rs. {{ number_format($pendingPayments, 2) }}
                        </h2>

                    </div>

                </div>

                <div style="
                    border-top:1px solid #eef2f7;
                    padding-top:14px;
                    color:#94a3b8;
                    font-size:12px;
                ">
                    Outstanding amount requiring attention
                </div>

            </div>

        </div>

    </div>


    <!-- Responsive Dashboard -->

    <style>

        .stat-card:hover {
            transform:translateY(-2px);
            box-shadow:0 10px 24px rgba(15,23,42,0.08);
        }

        @media (max-width: 1200px) {
            .stat-grid {
                grid-template-columns:repeat(2, minmax(0, 1fr)) !important;
            }
        }

        @media (max-width: 800px) {
            .stat-grid {
                grid-template-columns:1fr !important;
            }

            .bottom-grid {
                grid-template-columns:1fr !important;
            }
        }

        @media (max-width: 600px) {
            h1 {
                font-size:22px !important;
            }
        }

    </style>


    <!-- Socket.IO -->

    <script src="https://cdn.socket.io/4.8.1/socket.io.min.js"></script>

    <script>

        const socket = io('http://localhost:3000');

        socket.on('connect', function () {

            console.log(
                'Connected to Socket.IO:',
                socket.id
            );

        });


        socket.on('new-complaint', function (complaint) {

            console.log(
                'New complaint received:',
                complaint
            );


            document.getElementById(
                'notificationSubject'
            ).innerText = complaint.subject;


            document.getElementById(
                'notificationPriority'
            ).innerText =
                'Priority: ' +
                complaint.priority.toUpperCase();


            document.getElementById(
                'notification'
            ).style.display = 'block';


            setTimeout(function () {

                closeNotification();

            }, 5000);

        });


        function closeNotification() {

            document.getElementById(
                'notification'
            ).style.display = 'none';

        }

    </script>

</x-app-layout>