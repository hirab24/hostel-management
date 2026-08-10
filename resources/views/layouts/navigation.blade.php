<style>
    .hostel-sidebar {
        position: fixed;
        top: 0;
        left: 0;
        width: 280px;
        height: 100vh;
        background: linear-gradient(180deg, #172033 0%, #131b2b 100%);
        color: white;
        z-index: 99999;
        display: flex;
        flex-direction: column;
        overflow-y: auto;
        box-shadow: 4px 0 24px rgba(0, 0, 0, 0.15);
        font-family: Arial, sans-serif;
    }

    .sidebar-logo {
        height: 76px;
        min-height: 76px;
        display: flex;
        align-items: center;
        padding: 0 24px;
        border-bottom: 1px solid rgba(255,255,255,0.08);
        font-size: 19px;
        font-weight: 700;
        letter-spacing: -0.2px;
    }

    .sidebar-menu {
        padding: 22px 14px;
        flex: 1;
    }

    .sidebar-menu-title {
        color: #7c8aa5;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1.2px;
        padding: 0 12px 14px;
    }

    .sidebar-link {
        display: flex;
        align-items: center;
        gap: 13px;
        width: 100%;
        height: 46px;
        padding: 0 14px;
        margin-bottom: 4px;
        border-radius: 10px;
        color: #cbd5e1;
        text-decoration: none;
        font-size: 14px;
        font-weight: 500;
        transition: all 0.18s ease;
    }

    .sidebar-link:hover {
        background: rgba(255,255,255,0.07);
        color: white;
    }

    .sidebar-link.active {
        background: #0f766e;
        color: white;
        box-shadow: 0 4px 12px rgba(15,118,110,0.35);
    }

    .sidebar-icon {
        width: 26px;
        text-align: center;
        font-size: 17px;
        flex-shrink: 0;
    }

    .sidebar-bottom {
        padding: 16px 14px 20px;
        border-top: 1px solid rgba(255,255,255,0.08);
    }

    .user-name {
        display: flex;
        align-items: center;
        gap: 10px;
        background: rgba(255,255,255,0.05);
        border: 1px solid rgba(255,255,255,0.06);
        border-radius: 10px;
        padding: 11px 12px;
        margin-bottom: 10px;
        color: #e2e8f0;
        font-size: 13px;
        font-weight: 600;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }

    .bottom-link,
    .logout-button {
        display: flex;
        align-items: center;
        gap: 12px;
        width: 100%;
        height: 42px;
        padding: 0 13px;
        border: none;
        border-radius: 9px;
        background: transparent;
        color: #cbd5e1;
        text-decoration: none;
        font-family: Arial, sans-serif;
        font-size: 14px;
        cursor: pointer;
        text-align: left;
        transition: all 0.18s ease;
    }

    .bottom-link:hover {
        background: rgba(255,255,255,0.07);
        color: white;
    }

    .logout-button {
        color: #fca5a5;
    }

    .logout-button:hover {
        background: rgba(239,68,68,0.12);
        color: #fecaca;
    }

    @media (max-width: 900px) {
        .hostel-sidebar {
            width: 240px;
        }
    }

    @media (max-width: 700px) {
        .hostel-sidebar {
            width: 230px;
        }
    }
</style>


<aside class="hostel-sidebar">

    <!-- LOGO -->

    <div class="sidebar-logo">
        <span>🏠</span>

        <span style="margin-left: 10px;">
            Hostel Manager
        </span>
    </div>


    <!-- MENU -->

    <div class="sidebar-menu">

        <div class="sidebar-menu-title">
            Main Menu
        </div>


        <!-- Dashboard -->

        <a
            href="{{ route('dashboard') }}"
            class="sidebar-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
        >
            <span class="sidebar-icon">🏠</span>
            <span>Dashboard</span>
        </a>


        <!-- Rooms -->

        <a
            href="{{ route('rooms.index') }}"
            class="sidebar-link {{ request()->routeIs('rooms.*') ? 'active' : '' }}"
        >
            <span class="sidebar-icon">🛏️</span>
            <span>Rooms</span>
        </a>


        <!-- Residents -->

        <a
            href="{{ route('residents.index') }}"
            class="sidebar-link {{ request()->routeIs('residents.*') ? 'active' : '' }}"
        >
            <span class="sidebar-icon">👥</span>
            <span>Residents</span>
        </a>


        <!-- Payments -->

        <a
            href="{{ route('payments.index') }}"
            class="sidebar-link {{ request()->routeIs('payments.*') ? 'active' : '' }}"
        >
            <span class="sidebar-icon">💰</span>
            <span>Payments</span>
        </a>


        <!-- Complaints -->

        <a
            href="{{ route('complaints.index') }}"
            class="sidebar-link {{ request()->routeIs('complaints.*') ? 'active' : '' }}"
        >
            <span class="sidebar-icon">📢</span>
            <span>Complaints</span>
        </a>

    </div>


    <!-- BOTTOM -->

    <div class="sidebar-bottom">

        @auth

            <div class="user-name">
                <span>👩‍💻</span>
                <span>{{ Auth::user()->name }}</span>
            </div>


            <a
                href="{{ route('profile.edit') }}"
                class="bottom-link"
            >
                <span>⚙️</span>
                <span>Profile</span>
            </a>


            <form
                method="POST"
                action="{{ route('logout') }}"
                style="margin: 0;"
            >

                @csrf

                <button
                    type="submit"
                    class="logout-button"
                >
                    <span>🚪</span>
                    <span>Logout</span>
                </button>

            </form>

        @endauth

    </div>

</aside>