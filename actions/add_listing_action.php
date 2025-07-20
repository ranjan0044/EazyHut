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

// Validate required fields
$required = ['name','address','is_pg','for_gender','occupancy','city','area','price'];
foreach ($required as $field) {
  if (empty($_POST[$field])) {
    header('Location: ' . BASE_URL . 'pages/add_listing.php?error=missing');
    exit();
  }
}
$name = trim($_POST['name']);
$address = trim($_POST['address']);
$is_pg = intval($_POST['is_pg']);
$for_gender = $_POST['for_gender'];
$occupancy = $_POST['occupancy'];
$city = trim($_POST['city']);
$area = trim($_POST['area']);
$price = intval($_POST['price']);
$status = ($role === 'admin') ? 'approved' : 'pending';

// Insert listing
$stmt = $conn->prepare('INSERT INTO listings (name, address, city, area, owner_id, is_pg, for_gender, price, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
$stmt->bind_param('ssssissis', $name, $address, $city, $area, $user_id, $is_pg, $for_gender, $price, $status);
if (!$stmt->execute()) {
  header('Location: ' . BASE_URL . 'pages/add_listing.php?error=server');
  exit();
}
$listing_id = $stmt->insert_id;
$stmt->close();

// Handle amenities
if (!empty($_POST['amenities']) && is_array($_POST['amenities'])) {
  $amenities = $_POST['amenities'];
  foreach ($amenities as $amenity) {
    $a_stmt = $conn->prepare('INSERT INTO listing_amenities (listing_id, amenity_id) SELECT ?, id FROM amenities WHERE name = ?');
    $a_stmt->bind_param('is', $listing_id, $amenity);
    $a_stmt->execute();
    $a_stmt->close();
  }
}

// Handle image uploads (local for now)
if (!empty($_FILES['images']['name'][0])) {
  $upload_dir = __DIR__ . '/../uploads/';
  foreach ($_FILES['images']['tmp_name'] as $i => $tmp_name) {
    if ($_FILES['images']['error'][$i] === UPLOAD_ERR_OK) {
      $filename = uniqid('img_') . '_' . basename($_FILES['images']['name'][$i]);
      $target = $upload_dir . $filename;
      if (move_uploaded_file($tmp_name, $target)) {
        $img_url = '/uploads/' . $filename;
        $img_stmt = $conn->prepare('INSERT INTO images (listing_id, url) VALUES (?, ?)');
        $img_stmt->bind_param('is', $listing_id, $img_url);
        $img_stmt->execute();
        $img_stmt->close();
      }
    }
  }
}

header('Location: ' . BASE_URL . 'pages/my_listings.php?added=1');
exit(); 