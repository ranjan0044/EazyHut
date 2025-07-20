<?php
// includes/auth.php
include_once __DIR__ . '/config.php';
// Session and role guard functions for Eazy Hut

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function is_logged_in() {
    return isset($_SESSION['user_id']);
}

function require_login() {
    if (!is_logged_in()) {
        header('Location: ' . BASE_URL . 'pages/login.php');
        exit();
    }
}

function require_role($role) {
    if (!is_logged_in() || $_SESSION['role'] !== $role) {
        header('Location: ' . BASE_URL . 'pages/login.php');
        exit();
    }
}

// Usage: Call require_login() or require_role('admin') at the top of protected pages 