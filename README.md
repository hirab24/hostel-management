# 🏠 Hostel Management System

A modern, full-featured Hostel Management System built with **Laravel** and **Blade**, designed to help hostel administrators manage rooms, residents, payments, and complaints from a single, clean dashboard — with **real-time notifications** powered by Socket.IO.

---

## ✨ Features

- 📊 **Admin Dashboard** — At-a-glance overview of total rooms, active residents, available beds, and monthly collection
- 🛏️ **Room Management** — Add, edit, and track room availability and occupancy
- 👥 **Resident Management** — Manage resident profiles, room assignments, and status
- 💰 **Payment Tracking** — Record payments, track pending dues, and view monthly collection summaries
- 📢 **Complaints System** — Residents' complaints logged and tracked with priority levels
- 🔔 **Real-Time Notifications** — Instant alerts for new complaints using Socket.IO, no page refresh needed
- 📱 **Responsive Design** — Fully usable on desktop, tablet, and mobile devices

---

## 🛠️ Tech Stack

| Layer          | Technology              |
|----------------|--------------------------|
| Backend        | Laravel (PHP)            |
| Frontend       | Blade Templates, HTML/CSS |
| Database       | MySQL                    |
| Real-time      | Socket.IO                |
| Build Tool     | Vite                     |

---

## 📸 Screenshots

### Dashboard
![Dashboard](screenshots/dashboard.png)

### Rooms
![Rooms](screenshots/rooms.png)

### Residents
![Residents](screenshots/residents.png)

### Payments
![Payments](screenshots/payments.png)

### Complaints
![Complaints](screenshots/complaints.png)

### Mobile View
![Mobile View](screenshots/mobile.png)

---

## 🚀 Getting Started

### Prerequisites

- PHP >= 8.1
- Composer
- MySQL
- Node.js & npm

### Installation

```bash
# Clone the repository
git clone https://github.com/your-username/hostel-management.git
cd hostel-management

# Install PHP dependencies
composer install

# Install JS dependencies
npm install

# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### Configure Environment

Update your `.env` file with your database credentials:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=hostel_management
DB_USERNAME=root
DB_PASSWORD=
```

### Run Migrations

```bash
php artisan migrate
```

### Build Frontend Assets

```bash
npm run dev
```

### Serve the Application

```bash
php artisan serve
```

Visit `http://127.0.0.1:8000` in your browser.

---

## 🗂️ Project Structure

```
hostel-management/
├── app/
│   ├── Http/Controllers/       # Application controllers
│   └── View/Components/        # Blade components (AppLayout, etc.)
├── resources/
│   └── views/
│       ├── layouts/            # Main layout & navigation
│       ├── admin/              # Admin dashboard
│       ├── rooms/              # Room management views
│       ├── residents/          # Resident management views
│       ├── payments/           # Payment views
│       └── complaints/         # Complaints views
├── routes/
│   └── web.php                 # Application routes
└── database/
    └── migrations/             # Database schema
```

---

## 🔔 Real-Time Notifications

This project uses **Socket.IO** to push live notifications to the admin dashboard whenever a new complaint is submitted — no page refresh required.

---

## 📄 License

This project is open-source and available under the [MIT License](LICENSE).

---

## 🙋‍♂️ Author

Made with ❤️ for efficient hostel management.
