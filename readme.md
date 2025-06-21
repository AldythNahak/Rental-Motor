# Salatiga Motorcycle Rental Web Application 🛵

A web-based platform built with **Laravel PHP** for renting motorcycles in **Salatiga**, Indonesia. This application allows users to browse available motorcycles, make bookings, manage rentals, and handle administrative tasks efficiently.

---

## 🌐 Features

- User registration & login
- Motorcycle listing with availability status
- Booking system with schedule management
- Admin dashboard for managing motorcycles, bookings, and users
- Payment tracking (optional or coming soon)
- Responsive and user-friendly interface

---

## ⚙️ Tech Stack

- **Backend:** Laravel PHP  
- **Database:** MySQL / MariaDB  
- **Frontend:** Blade Templates, Bootstrap (or other CSS framework)  
- **Authentication:** Laravel Breeze / Sanctum (if configured)  
- **Deployment:** Apache/Nginx, shared hosting, or VPS

---

## 🚀 Getting Started

### ✅ Prerequisites

- PHP >= 7.0  
- Composer  
- MySQL or MariaDB  
- Node.js & npm (for frontend assets)

### ⚙️ Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/AldythNahak/rental-motor.git
   cd rental-motor
   ```
2. Install PHP dependencies:
    ```bash
   composer install
   ```
3. Copy and configure .env:
   ```bash
    cp .env.example .env
    php artisan key:generate
   ```
4. Copy and configure .env:
   Set up the database:
    - Create a MySQL database
    - Configure .env with your DB credentials
5. Run migrations:
   ```bash
    php artisan migrate
   ```
6. Serve the app:
   ```bash
    php artisan serve
   ```
   Visit http://localhost:8000 to view the app.


## 📖 Goal

This repository serves as a learning log, a reference for University Class Exam, and a contribution to the open-source learning community.

---

## 🧑‍💻 Author

**Aldyth Nahak**  
[LinkedIn](https://linkedin.com/in/aldythnahak) | [GitHub](https://github.com/AldythNahak)

---

## ⭐️ Contribute or Follow

Feel free to fork, clone, or star this repo if you find it helpful!
