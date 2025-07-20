<?php
include_once __DIR__ . '/../includes/config.php';
include_once __DIR__ . '/../includes/db.php';
session_start();
if (!isset($_SESSION['user_id'])) {
  header('Location: ' . BASE_URL . 'pages/login.php');
  exit();
}
$user_id = $_SESSION['user_id'];
$role = $_SESSION['role'];
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if (!$id) {
  header('Location: ' . BASE_URL . 'pages/my_listings.php?error=invalid');
  exit();
}
// Only allow delete if admin or owner of listing
$sql = ($role === 'admin') ? "DELETE FROM listings WHERE id=?" : "DELETE FROM listings WHERE id=? AND owner_id=?";
$stmt = $conn->prepare($sql);
if ($role === 'admin') {
  $stmt->bind_param('i', $id);
} else {
  $stmt->bind_param('ii', $id, $user_id);
}
$stmt->execute();
$stmt->close();
header('Location: ' . BASE_URL . 'pages/my_listings.php?deleted=1');
exit(); 