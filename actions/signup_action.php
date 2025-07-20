<?php
// actions/signup_action.php
include_once __DIR__ . '/../includes/config.php';
include_once __DIR__ . '/../includes/db.php';
session_start();

$name = isset($_POST['name']) ? trim($_POST['name']) : '';
$phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
$otp = isset($_POST['otp']) ? trim($_POST['otp']) : '';

if ($otp === '111111') {
    // Check if phone already exists
    $stmt = $conn->prepare('SELECT id FROM users WHERE phone = ?');
    $stmt->bind_param('s', $phone);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        // Phone already registered
        header('Location: ' . BASE_URL . 'pages/signup.php?error=exists');
        exit();
    } else {
        // Insert new user
        $stmt = $conn->prepare('INSERT INTO users (name, phone, role) VALUES (?, ?, "user")');
        $stmt->bind_param('ss', $name, $phone);
        if ($stmt->execute()) {
            $_SESSION['user_id'] = $stmt->insert_id;
            $_SESSION['name'] = $name;
            $_SESSION['role'] = 'user';
            header('Location: ' . BASE_URL);
            exit();
        } else {
            header('Location: ' . BASE_URL . 'pages/signup.php?error=server');
            exit();
        }
    }
} else {
    // Invalid OTP
    header('Location: ' . BASE_URL . 'pages/signup.php?error=otp');
    exit();
} 