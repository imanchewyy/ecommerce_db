# 🛒 E-Commerce Database System

## 📌 Project Overview
This project is a web-based E-Commerce System developed using the CakePHP framework. The system is designed to manage online shopping activities including product management, user management, order processing, and category organization.

The purpose of this system is to simulate a real-world e-commerce platform that supports both administrators and users in managing and purchasing products efficiently.

---

## 🎯 Objectives
- To develop a functional e-commerce website using CakePHP
- To manage products, categories, and orders effectively
- To provide a user-friendly interface for online shopping
- To implement CRUD operations for all major modules
- To demonstrate database integration in a web application

---

## ⚙️ System Features

### 👤 User Management
- User registration and login
- User data management
- Authentication system

### 📦 Product Management
- Add, edit, delete products
- View product listings
- Product categorization

### 🗂️ Category Management
- Organize products into categories
- Add and manage categories

### 🛒 Order Management
- Place orders
- Manage order items
- Track purchase records

### 📊 Dashboard
- Overview of system data
- Summary of users, products, and orders

---

## 🚀 Installation Guide (Laragon Setup)

Follow these steps to run the system using Laragon:

### Step 1: Move Project Folder
- Extract the project ZIP file
- Copy the project folder
- Paste into: C:\laragon\www\

### Step 2: Start Laragon
- Open Laragon
- Click **Start All**
- Ensure Apache and MySQL are running

### Step 3: Create Database
- Open **phpMyAdmin** (http://localhost/phpmyadmin)
- Create a new database: ecommerce_db

### Step 4: Import Database
- Click the created database
- Go to **Import**
- Upload the SQL file from the project (e.g. `ecommerce_db.sql`)
- Click **Go**

### Step 5: Configure Database Connection
- Open file: config/app_local.php

- Update database settings:
  'Datasources' => [
    'default' => [
        'host' => 'localhost',
        'username' => 'root',
        'password' => '',
        'database' => 'ecommerce_db',
    ],
],

### Step 6: Access the System
Open browser and go to: http://localhost/ecommerce_db

### Step 7 (Optional): Run CakePHP Server
If needed: bin/cake server

---

## 🏗️ System Architecture

The system follows MVC (Model-View-Controller) architecture:

- **Model** → Handles database logic (Products, Users, Orders)
- **View** → Displays user interface (templates)
- **Controller** → Handles user requests and logic

---

## 🗄️ Database Structure

Main tables used:
- Users
- Products
- Categories
- Orders
- OrderItems

Each table is connected using relational database concepts.

---

## 🛠️ Technologies Used

- **Framework:** CakePHP
- **Language:** PHP
- **Database:** MySQL
- **Frontend:** HTML, CSS
- **Server:** XAMPP / Laragon

---

## 🚀 Installation Guide

### Step 1: Clone Repository
```bash
git clone https://github.com/imanchewyy/ecommerce_db.git
