CREATE DATABASE IF NOT EXISTS tiffin_service;
USE tiffin_service;

-- Table for menu
CREATE TABLE IF NOT EXISTS menu (
    id INT AUTO_INCREMENT PRIMARY KEY,
    day VARCHAR(20),
    meal_type VARCHAR(20),
    items VARCHAR(200)
);

-- Table for customer selections
CREATE TABLE IF NOT EXISTS selections (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(100),
    day VARCHAR(20),
    meal_type VARCHAR(20),
    status VARCHAR(20) DEFAULT 'Pending'
);

-- Admin table
CREATE TABLE IF NOT EXISTS admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(50)
);

-- Default Admin Account
INSERT INTO admin (username, password) 
SELECT 'admin', 'admin123'
WHERE NOT EXISTS (SELECT 1 FROM admin WHERE username = 'admin');
