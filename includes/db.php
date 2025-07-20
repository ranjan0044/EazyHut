<?php
// includes/db.php
// MySQL connection for Eazy Hut

$host = 'localhost';
$db   = 'eazyhut2'; // Change to your DB name
$user = 'root';   // Change to your DB user
$pass = '';       // Change to your DB password

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die('Database connection failed: ' . $conn->connect_error);
}

// Usage: include this file in other scripts to use $conn 