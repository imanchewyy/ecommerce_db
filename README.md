# 🛒 E-Commerce Database System

---

## 📌 Project Overview
The system is designed to manage online shopping activities including product management, user management, order processing, and category organization.

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

### 1️⃣ Move Project Folder
- Extract the project ZIP file  
- Copy the project folder  
- Paste into:
```bash
C:\laragon\www\

---

### 2️⃣ Start Laragon
- Open Laragon  
- Click **Start All**  
- Ensure Apache and MySQL are running  

---

### 3️⃣ Create Database
- Open phpMyAdmin:  
  http://localhost/phpmyadmin  
- Create a new database: ecommerce_db


---

### 4️⃣ Import Database
- Select the database  
- Click **Import**  
- Upload the SQL file (e.g. `ecommerce_db.sql`)  
- Click **Go**  

---

### 5️⃣ Configure Database Connection
Open file: config/app_local.php


Update:

```php
'Datasources' => [
    'default' => [
        'host' => 'localhost',
        'username' => 'root',
        'password' => '',
        'database' => 'ecommerce_db',
    ],
],

### 6️⃣ Access the System
Open browser and go to: http://localhost/ecommerce_db




