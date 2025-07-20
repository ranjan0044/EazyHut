<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<?php include_once __DIR__ . '/../includes/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Eazy Hut – PG & Hostel Listing</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-lg sticky-top">
  <div class="container">
    <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="<?php echo BASE_URL; ?>">
      <span class="d-inline-flex align-items-center justify-content-center bg-primary rounded-2" style="width:40px;height:40px;">
        <!-- EazyHut Logo SVG -->
        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <rect width="24" height="24" rx="6" fill="url(#eazyhut-logo-gradient)"/>
          <path d="M7 17V11.5L12 8L17 11.5V17C17 17.5523 16.5523 18 16 18H8C7.44772 18 7 17.5523 7 17Z" fill="white"/>
          <defs>
            <linearGradient id="eazyhut-logo-gradient" x1="0" y1="0" x2="24" y2="24" gradientUnits="userSpaceOnUse">
              <stop stop-color="#2563eb"/>
              <stop offset="1" stop-color="#14b8a6"/>
            </linearGradient>
          </defs>
        </svg>
      </span>
      <span class="fs-4 text-dark">EazyHut</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="<?php echo BASE_URL; ?>">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo BASE_URL; ?>pages/search.php">Browse PGs</a></li>
        <li class="nav-item"><a class="nav-link" href="#">About</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
      </ul>
      <ul class="navbar-nav ms-3 mb-2 mb-lg-0">
        <?php if (isset($_SESSION['user_id'])): ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <span class="me-2"><i class="bi bi-person-circle"></i></span>
              Hello! <?php echo htmlspecialchars(explode(' ', $_SESSION['name'])[0]); ?>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
              <?php if ($_SESSION['role'] === 'admin'): ?>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>pages/admin/dashboard.php">Dashboard</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>pages/my_listings.php">My Listings</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>pages/add_listing.php">Add Listing</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>pages/admin/user_management.php">User Management</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>pages/admin/review_listings.php">Review Listings</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>pages/profile.php">Profile</a></li>
              <?php elseif ($_SESSION['role'] === 'pg-owner' || $_SESSION['role'] === 'room-owner'): ?>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>pages/admin/dashboard.php">Dashboard</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>pages/my_listings.php">My Listings</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>pages/add_listing.php">Add Listing</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>pages/profile.php">Profile</a></li>
              <?php else: ?>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>pages/profile.php">Profile</a></li>
              <?php endif; ?>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>logout.php">Logout</a></li>
            </ul>
          </li>
        <?php else: ?>
          <li class="nav-item"><a class="nav-link" href="<?php echo BASE_URL; ?>pages/login.php">Login</a></li>
          <li class="nav-item"><a class="btn btn-primary ms-2" href="<?php echo BASE_URL; ?>pages/signup.php">Sign Up</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav> 