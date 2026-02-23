-- PostgreSQL Compatible Database Schema
-- Created for Render deployment

DROP TABLE IF EXISTS selections;
DROP TABLE IF EXISTS menu;
DROP TABLE IF EXISTS admin;

CREATE TABLE menu (
    id SERIAL PRIMARY KEY,
    day VARCHAR(20) NOT NULL,
    meal_type VARCHAR(20) NOT NULL,
    items TEXT NOT NULL
);

CREATE TABLE selections (
    id SERIAL PRIMARY KEY,
    customer_name VARCHAR(100) NOT NULL,
    day VARCHAR(20) NOT NULL,
    meal_type VARCHAR(20) NOT NULL,
    status VARCHAR(20) DEFAULT 'Pending',
    selection_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE admin (
    id SERIAL PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL
);

-- Insert default admin
INSERT INTO admin (username, password) VALUES ('admin', 'admin123');
