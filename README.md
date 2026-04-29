# 🎓 UniTrack — Student Task Management System

UniTrack is a full-stack web application designed to help students manage tasks, deadlines, and priorities with a clean UI and smart reminders.  
It includes an admin control center, feedback system, payment approval workflow, and role-based access.

Built as an academic + portfolio project using Laravel and Tailwind CSS.

---

## ✨ Key Features

### 👨‍🎓 Student Side
- User authentication (Register / Login)
- Task creation with status (Pending / Ongoing / Done)
- Priority colors (🔴 Red / 🟢 Green / 🔵 Blue)
- 📌 **Sorted Task Wall Cards** (All / Pending / Ongoing / Done)
- Smart views (Today / Upcoming)
- Email reminder notifications
- Dashboard overview
- Feedback system with rating + emoji
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
- Internal REST API (Tasks & Notifications)
- Responsive glass UI design
- Real-time UI updates
- Secure authentication middleware

---

## 🚀 Technologies Used

### Backend
- Laravel (PHP Framework)
- PHP
- SQLite (Database)
- Laravel REST APIs
- Middleware (Role-based protection)
- Eloquent ORM

### Frontend
- Blade Templates
- Tailwind CSS
- Vanilla JavaScript

### Development Tools
- Visual Studio Code
- Git & GitHub
- Vite
- npm
- macOS Terminal

---

## 🧪 Automated Testing

UniTrack includes **fully implemented automated testing** using Laravel PHPUnit.

Test coverage includes:
- Task Management System ✅
- Notification System ✅
- Payment & Admin Approval Workflow ✅
- Profile & User System ✅
- Authentication System (Laravel Breeze, modified) ✅

These tests simulate real user actions and ensure system reliability, correctness, and stability.

---

## 📌 Project Type

Full-Stack Web Application (Laravel + Tailwind)  
Hybrid architecture: Blade frontend + Laravel internal APIs

---

## 👨‍💻 Author

**Ko Kyi Phyu Aung**  
🎓 Strategy First University (Myanmar)

---

## 💡 Project Purpose

This project was developed to practice:

- Full-stack Laravel development  
- API design  
- Authentication & authorization  
- Admin dashboard systems  
- UI/UX design  
- Database relationships  
- Real-world SaaS concepts  

---

## 🛠 Installation (Local Development)

```bash
git clone https://github.com/KyiPhyuAung/unitrack
cd uni-task-tracker

composer install
npm install

cp .env.example .env
php artisan key:generate
php artisan migrate