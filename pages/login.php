<?php
include_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../templates/header.php';
$show_otp_login = isset($_POST['show_otp_login']) && $_POST['show_otp_login'] === '1';
$show_otp_signup = isset($_POST['show_otp_signup']) && $_POST['show_otp_signup'] === '1';
$name_val = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
$phone_val = isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '';
?>
<div class="min-vh-100 d-flex align-items-center justify-content-center" style="background: linear-gradient(120deg, #e0e7ff 0%, #f0fdfa 100%); font-family: 'Inter', 'Segoe UI', 'Roboto', Arial, sans-serif;">
  <div class="login-card">
    <div class="text-center mb-3">
      <h2 class="fw-bold mb-1" style="font-size:2rem;">Welcome Back</h2>
      <div class="text-muted mb-3" style="font-size:1.1rem;">Sign in to your EazyHut account</div>
    </div>
    <div class="login-tabs" id="loginTabs">
      <button type="button" class="login-tab active" id="tabLogin">Login</button>
      <button type="button" class="login-tab" id="tabSignup">Sign Up</button>
    </div>
    <div id="loginForm" style="display:block;">
      <form method="post" action="" autocomplete="off">
        <div class="mb-3">
          <label class="form-label">Phone Number</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-telephone"></i></span>
            <input type="text" name="phone" class="form-control" maxlength="10" required placeholder="Enter your 10-digit mobile number" value="<?php echo $phone_val; ?>" <?php if($show_otp_login) echo 'readonly'; ?> >
          </div>
          <div class="form-text">Enter your 10-digit mobile number</div>
        </div>
        <?php if ($show_otp_login): ?>
        <div class="mb-3">
          <label class="form-label">OTP</label>
          <input type="text" name="otp" class="form-control" maxlength="6" required placeholder="Enter OTP (dev: 111111)">
          <div class="form-text">For development, use OTP <b>111111</b> for all users.</div>
        </div>
        <button type="submit" formaction="<?php echo BASE_URL; ?>actions/login_action.php" class="search-btn w-100">Login</button>
        <?php else: ?>
        <input type="hidden" name="show_otp_login" value="1">
        <button type="submit" class="search-btn w-100">Send OTP</button>
        <?php endif; ?>
      </form>
      <div class="text-center mt-3">
        <span class="text-muted">Don't have an account?</span> <a href="#" id="switchToSignup">Sign up</a>
      </div>
    </div>
    <div id="signupForm" style="display:none;">
      <form method="post" action="" autocomplete="off">
        <div class="mb-3">
          <label class="form-label">Full Name</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-person"></i></span>
            <input type="text" name="name" class="form-control" required placeholder="Enter your full name" value="<?php echo $name_val; ?>" <?php if($show_otp_signup) echo 'readonly'; ?> >
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label">Phone Number</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-telephone"></i></span>
            <input type="text" name="phone" class="form-control" maxlength="10" required placeholder="Enter your 10-digit mobile number" value="<?php echo $phone_val; ?>" <?php if($show_otp_signup) echo 'readonly'; ?> >
          </div>
          <div class="form-text">Enter your 10-digit mobile number</div>
        </div>
        <?php if ($show_otp_signup): ?>
        <div class="mb-3">
          <label class="form-label">OTP</label>
          <input type="text" name="otp" class="form-control" maxlength="6" required placeholder="Enter OTP (dev: 111111)">
          <div class="form-text">For development, use OTP <b>111111</b> for all users.</div>
        </div>
        <button type="submit" formaction="<?php echo BASE_URL; ?>actions/signup_action.php" class="search-btn w-100">Sign Up</button>
        <?php else: ?>
        <input type="hidden" name="show_otp_signup" value="1">
        <button type="submit" class="search-btn w-100">Send OTP</button>
        <?php endif; ?>
      </form>
      <div class="text-center mt-3">
        <span class="text-muted">Already have an account?</span> <a href="#" id="switchToLogin">Sign in</a>
      </div>
    </div>
  </div>
</div>
<script>
// Tab switcher logic
const tabLogin = document.getElementById('tabLogin');
const tabSignup = document.getElementById('tabSignup');
const loginForm = document.getElementById('loginForm');
const signupForm = document.getElementById('signupForm');
const switchToSignup = document.getElementById('switchToSignup');
const switchToLogin = document.getElementById('switchToLogin');

function showLogin() {
  tabLogin.classList.add('active');
  tabSignup.classList.remove('active');
  loginForm.style.display = 'block';
  signupForm.style.display = 'none';
}
function showSignup() {
  tabSignup.classList.add('active');
  tabLogin.classList.remove('active');
  signupForm.style.display = 'block';
  loginForm.style.display = 'none';
}
tabLogin.addEventListener('click', showLogin);
tabSignup.addEventListener('click', showSignup);
if (switchToSignup) switchToSignup.addEventListener('click', function(e){ e.preventDefault(); showSignup(); });
if (switchToLogin) switchToLogin.addEventListener('click', function(e){ e.preventDefault(); showLogin(); });
// On page load, show correct tab if OTP was requested
<?php if ($show_otp_signup): ?>showSignup();<?php endif; ?>
</script>
<?php require_once __DIR__ . '/../templates/footer.php'; ?> 