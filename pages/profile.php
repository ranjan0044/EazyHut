<?php
include_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../templates/header.php';
session_start();
$name = isset($_SESSION['name']) ? $_SESSION['name'] : '';
$phone = isset($_SESSION['phone']) ? $_SESSION['phone'] : '';
$role = isset($_SESSION['role']) ? $_SESSION['role'] : '';
?>
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card shadow-lg border-0" style="border-radius:1.5rem;">
        <div class="card-body p-4">
          <h2 class="mb-3 fw-bold" style="font-family:'Inter',sans-serif;">My Profile</h2>
          <form method="post" action="#">
            <div class="mb-3">
              <label class="form-label fw-semibold">Full Name</label>
              <input type="text" name="name" class="form-control" value="<?php echo htmlspecialchars($name); ?>" required>
            </div>
            <div class="mb-3">
              <label class="form-label fw-semibold">Phone Number</label>
              <input type="text" class="form-control" value="<?php echo htmlspecialchars($phone); ?>" readonly>
            </div>
            <div class="mb-3">
              <label class="form-label fw-semibold">Role</label>
              <input type="text" class="form-control" value="<?php echo htmlspecialchars($role); ?>" readonly>
            </div>
            <button type="submit" class="btn btn-primary w-100 fw-bold" style="font-size:1.1rem;">Update Profile</button>
          </form>
          <hr>
          <button class="btn btn-outline-danger w-100 mt-2">Delete Account</button>
        </div>
      </div>
    </div>
  </div>
</div>
<?php require_once __DIR__ . '/../templates/footer.php'; ?> 