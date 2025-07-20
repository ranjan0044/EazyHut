-- Eazy Hut MySQL Schema
-- Charset: utf8mb4
--
-- IMPORT INSTRUCTIONS:
-- 1. Create the database (e.g., CREATE DATABASE eazyhut CHARACTER SET utf8mb4;)
-- 2. USE eazyhut;
-- 3. Run this script in phpMyAdmin or MySQL CLI.
--
-- TABLES are created first, then demo data is inserted in dependency order:
--   users → listings → amenities → images → reports → listing_amenities

CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  phone VARCHAR(15) NOT NULL UNIQUE,
  role ENUM('admin','pg-owner','room-owner','user') DEFAULT 'user',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS listings (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(150) NOT NULL,
  address VARCHAR(255) NOT NULL,
  city VARCHAR(50) NOT NULL,
  area VARCHAR(50) NOT NULL,
  owner_id INT NOT NULL,
  is_pg BOOLEAN NOT NULL DEFAULT 1,
  for_gender ENUM('boys','girls','unisex') DEFAULT 'unisex',
  price INT NOT NULL,
  status ENUM('pending','approved','rejected') DEFAULT 'pending',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (owner_id) REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS amenities (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL,
  icon VARCHAR(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS images (
  id INT AUTO_INCREMENT PRIMARY KEY,
  listing_id INT NOT NULL,
  url VARCHAR(255) NOT NULL,
  FOREIGN KEY (listing_id) REFERENCES listings(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS reports (
  id INT AUTO_INCREMENT PRIMARY KEY,
  listing_id INT NOT NULL,
  reason VARCHAR(255) NOT NULL,
  reported_by INT NOT NULL,
  status ENUM('pending','resolved') DEFAULT 'pending',
  FOREIGN KEY (listing_id) REFERENCES listings(id) ON DELETE CASCADE,
  FOREIGN KEY (reported_by) REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS listing_amenities (
  listing_id INT NOT NULL,
  amenity_id INT NOT NULL,
  PRIMARY KEY (listing_id, amenity_id),
  FOREIGN KEY (listing_id) REFERENCES listings(id) ON DELETE CASCADE,
  FOREIGN KEY (amenity_id) REFERENCES amenities(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- DEMO DATA (insert in dependency order)

-- Demo Users
INSERT INTO users (id, name, phone, role) VALUES
  (1, 'Ranjan Sarkar', '8744987942', 'admin'),
  (2, 'PG Owner 1', '1111111111', 'pg-owner'),
  (3, 'PG Owner 2', '2222222222', 'pg-owner'),
  (4, 'Room Owner', '3333333333', 'room-owner'),
  (5, 'Demo User', '9999999999', 'user');

-- Demo Listings
INSERT INTO listings (id, name, address, city, area, owner_id, is_pg, for_gender, price, status) VALUES
  (1, 'Sunrise PG for Boys', '123 Main St', 'Delhi', 'Connaught Place', 2, 1, 'boys', 7000, 'approved'),
  (2, 'Dream Girls Hostel', '456 Rose Ave', 'Delhi', 'Lajpat Nagar', 3, 1, 'girls', 8500, 'approved'),
  (3, 'Budget Room', '789 Park Lane', 'Delhi', 'Karol Bagh', 4, 0, 'unisex', 5000, 'pending'),
  (4, 'Elite PG', '101 Elite Rd', 'Delhi', 'Saket', 1, 1, 'unisex', 12000, 'approved');

-- Demo Amenities
INSERT INTO amenities (id, name, icon) VALUES
  (1, 'Wifi', 'wifi'),
  (2, 'Parking', 'car-front'),
  (3, 'Meals', 'cup-straw'),
  (4, 'Security', 'shield-check'),
  (5, 'Laundry', 'droplet'),
  (6, 'Gym', 'bar-chart');

-- Demo Images
DELETE FROM images;
INSERT INTO images (listing_id, url) VALUES
  (1, '/uploads/pg1_1.jpg'),
  (1, '/uploads/pg1_2.jpg'),
  (2, '/uploads/pg2_1.jpg'),
  (3, '/uploads/pg3_1.jpg'),
  (4, '/uploads/pg4_1.jpg'),
  (4, '/uploads/pg4_2.jpg');

-- Demo Reports
INSERT INTO reports (listing_id, reason, reported_by, status) VALUES
  (3, 'Fake address', 5, 'pending');

-- Demo Listing Amenities (must be last)
INSERT INTO listing_amenities (listing_id, amenity_id) VALUES
  (1, 1), (1, 2), (1, 3), (1, 4),
  (2, 1), (2, 3), (2, 4), (2, 5),
  (3, 1), (3, 2), (3, 3), (3, 6),
  (4, 1), (4, 2), (4, 3), (4, 4), (4, 6); 