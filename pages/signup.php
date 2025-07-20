<?php
include_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../templates/header.php';
$show_otp = isset($_POST['show_otp']) && $_POST['show_otp'] === '1';
$name_val = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
$phone_val = isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '';
?>
<div class="min-vh-100 d-flex align-items-center justify-content-center" style="background: linear-gradient(120deg, #e0e7ff 0%, #f0fdfa 100%);">
  <div class="card shadow-lg border-0 p-4" style="max-width: 400px; width: 100%; border-radius: 1.5rem;">
    <div class="text-center mb-3">
      <h2 class="fw-bold mb-1" style="font-size:2rem;">Create Account</h2>
      <div class="text-muted mb-3" style="font-size:1.1rem;">Sign up for EazyHut</div>
    </div>
    <div class="login-tabs">
      <a href="<?php echo BASE_URL; ?>pages/login.php" class="login-tab">Login</a>
      <a href="<?php echo BASE_URL; ?>pages/signup.php" class="login-tab active">Sign Up</a>
    </div>
    <form method="post" action="<?php echo BASE_URL; ?>pages/signup.php">
      <div class="mb-3">
        <label class="form-label">Full Name</label>
        <div class="input-group">
          <span class="input-group-text bg-white"><i class="bi bi-person"></i></span>
          <input type="text" name="name" class="form-control" required placeholder="Enter your full name" value="<?php echo $name_val; ?>" <?php if($show_otp) echo 'readonly'; ?>>
        </div>
      </div>
      <div class="mb-3">
        <label class="form-label">Phone Number</label>
        <div class="input-group">
          <span class="input-group-text bg-white"><i class="bi bi-telephone"></i></span>
          <input type="text" name="phone" class="form-control" maxlength="10" required placeholder="Enter your 10-digit mobile number" value="<?php echo $phone_val; ?>" <?php if($show_otp) echo 'readonly'; ?>>
        </div>
        <div class="form-text">Enter your 10-digit mobile number</div>
      </div>
      <?php if ($show_otp): ?>
      <div class="mb-3">
        <label class="form-label">OTP</label>
        <input type="text" name="otp" class="form-control" maxlength="6" required placeholder="Enter OTP (dev: 111111)">
        <div class="form-text">For development, use OTP <b>111111</b> for all users.</div>
      </div>
      <button type="submit" formaction="<?php echo BASE_URL; ?>actions/signup_action.php" class="search-btn w-100">Sign Up</button>
      <?php else: ?>
      <input type="hidden" name="show_otp" value="1">
      <button type="submit" class="search-btn w-100">Send OTP</button>
      <?php endif; ?>
    </form>
    <div class="text-center mt-3">
      <span class="text-muted">Already have an account?</span> <a href="<?php echo BASE_URL; ?>pages/login.php">Sign in</a>
    </div>
  </div>
</div>
<?php require_once __DIR__ . '/../templates/footer.php'; ?> 