<?php
include_once __DIR__ . '/../../includes/config.php';
require_once __DIR__ . '/../../templates/header.php';
include_once __DIR__ . '/../../includes/db.php';
// Fetch stats
$users = $conn->query('SELECT COUNT(*) as c FROM users')->fetch_assoc()['c'];
$listings = $conn->query('SELECT COUNT(*) as c FROM listings')->fetch_assoc()['c'];
$pending = $conn->query("SELECT COUNT(*) as c FROM listings WHERE status='pending'")->fetch_assoc()['c'];
?>
<div class="container py-5">
  <h3 class="mb-4">Admin Dashboard</h3>
  <div class="row mb-4 g-3">
    <div class="col-md-4">
      <div class="card shadow-sm p-3 text-center">
        <div class="fs-2 fw-bold text-primary"><?php echo $users; ?></div>
        <div class="text-muted">Total Users</div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card shadow-sm p-3 text-center">
        <div class="fs-2 fw-bold text-success"><?php echo $listings; ?></div>
        <div class="text-muted">Total Listings</div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card shadow-sm p-3 text-center">
        <div class="fs-2 fw-bold text-warning"><?php echo $pending; ?></div>
        <div class="text-muted">Pending Listings</div>
      </div>
    </div>
  </div>
  <div class="row g-3">
    <div class="col-md-3">
      <a href="user_management.php" class="btn btn-outline-primary w-100">User Management</a>
    </div>
    <div class="col-md-3">
      <a href="review_listings.php" class="btn btn-outline-warning w-100">Review Listings</a>
    </div>
    <div class="col-md-3">
      <a href="../my_listings.php" class="btn btn-outline-success w-100">My Listings</a>
    </div>
    <div class="col-md-3">
      <a href="../add_listing.php" class="btn btn-outline-secondary w-100">Add Listing</a>
    </div>
  </div>
  <!-- Add more dashboard widgets as needed -->
</div>
<?php require_once __DIR__ . '/../../templates/footer.php'; ?> 