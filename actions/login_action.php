<?php
// actions/login_action.php
include_once __DIR__ . '/../includes/config.php';
include_once __DIR__ . '/../includes/db.php';
session_start();

$phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
$otp = isset($_POST['otp']) ? trim($_POST['otp']) : '';

if ($otp === '111111') {
    // Check if user exists
    $stmt = $conn->prepare('SELECT id, name, role FROM users WHERE phone = ?');
    if ($stmt === false) {
        die('Prepare failed: ' . $conn->error);
    }
    $stmt->bind_param('s', $phone);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $name, $role);
        $stmt->fetch();
        // Set session
        $_SESSION['user_id'] = $id;
        $_SESSION['name'] = $name;
        $_SESSION['role'] = $role;
        header('Location: ' . BASE_URL);
        exit();
    } else {
        // User not found
        header('Location: ' . BASE_URL . 'pages/login.php?error=notfound');
        exit();
    }
} else {
    // Invalid OTP
    header('Location: ' . BASE_URL . 'pages/login.php?error=otp');
    exit();
} 