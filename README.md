# 🎓 UniTrack — Student Task Management System

UniTrack is a full-stack web application designed to help students manage tasks, deadlines, and priorities with a clean UI and smart reminders.  
It includes an admin control center, feedback system, payment approval workflow, and role-based access.

Built as an academic + portfolio project using Laravel and Tailwind CSS.

---

## ✨ Key Features

### 👨‍🎓 Student Side
- User authentication (Register / Login)
- Task creation with status (Pending / Ongoing / Done)
- Priority colors (Red / Green / Blue)
- Email reminder notifications
- Dashboard overview
- Feedback system with star rating + emoji
- Premium upgrade via receipt upload

### 🛡 Admin Panel
- Admin dashboard
- Payment approval system
- Feedback approval system
- User Control Panel:
  - View users
  - Change roles (Standard / Premium / Admin)
  - Delete accounts
- Reports & statistics

### ⚙ System Features
- Role-based access control
- Internal REST API for tasks & notifications
- Responsive glass UI design
- Real-time UI updates
- Secure authentication middleware

---

## 🚀 Technologies Used

### Backend
- Laravel (PHP Framework)
- PHP
- MySQL / MariaDB
- Laravel REST APIs
- Middleware (Admin / User role protection)
- Eloquent ORM

### Frontend
- Blade Templates
- Tailwind CSS
- Vanilla JavaScript

### Features Implemented
- Authentication system
- Role-based authorization (Admin / Premium / Standard)
- Task management
- Internal APIs
- Email reminders
- Feedback system with admin approval
- Admin dashboard
- User control center
- Payment request & approval workflow
- Responsive UI

### Development Tools
- Visual Studio Code
- Git & GitHub
- Vite
- npm
- macOS Terminal

---

## 📌 Project Type

Full-Stack Web Application (Laravel + Tailwind)

Hybrid architecture: Blade frontend + Laravel internal APIs.

---

## 👨‍💻 Author

**Ko Kyi Phyu Aung**  
🎓 Strategy First University (Myanmar)

---

## 💡 Project Purpose

This project was developed as a student portfolio system to practice:

- Full-stack Laravel development
- API design
- Authentication & authorization
- Admin dashboards
- UI/UX design
- Database relationships
- Real-world SaaS architecture concepts

---

## 🛠 Installation (Local Development)

```bash
git clone <your-repo-url>
cd uni-task-tracker
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm run dev
php artisan serve