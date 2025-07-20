<?php
include_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../templates/header.php';
include_once __DIR__ . '/../includes/db.php';
if (!isset($_SESSION['user_id'])) {
  header('Location: ' . BASE_URL . 'pages/login.php');
  exit();
}
$user_id = $_SESSION['user_id'];
$role = $_SESSION['role'];
$where = ($role === 'admin') ? 'owner_id = ' . $user_id : 'owner_id = ' . $user_id;
$sql = "SELECT * FROM listings WHERE $where ORDER BY created_at DESC";
$res = $conn->query($sql);
?>
<div class="container py-5">
  <h3 class="mb-4">My Listings</h3>
  <div class="row g-4">
    <?php if ($res && $res->num_rows > 0): while ($row = $res->fetch_assoc()):
      // Fetch first image for this listing
      $img_res = $conn->query("SELECT url FROM images WHERE listing_id=" . intval($row['id']) . " LIMIT 1");
      $img_url = ($img_res && $img_res->num_rows > 0) ? $img_res->fetch_assoc()['url'] : '/assets/images/no-image.png';
    ?>
      <div class="col-md-6 col-lg-4">
        <div class="card shadow-sm h-100" style="border-radius:1.2rem;">
          <img src="<?php echo $img_url; ?>" class="card-img-top" style="height:180px;object-fit:cover;border-radius:1.2rem 1.2rem 0 0;" alt="Listing image">
          <div class="card-body d-flex flex-column" style="font-family:'Inter',sans-serif;">
            <h5 class="card-title fw-bold mb-2"><?php echo htmlspecialchars($row['name']); ?></h5>
            <div class="mb-2 text-muted" style="font-size:0.97rem;">
              <?php echo htmlspecialchars($row['address']); ?>
            </div>
            <div class="mb-2 fw-bold" style="font-size:1.1rem;">
              ₹<?php echo number_format($row['price']); ?> / month
            </div>
            <div class="mb-2">
              <span class="badge bg-<?php echo $row['status'] === 'approved' ? 'success' : 'warning'; ?>">
                <?php echo ucfirst($row['status']); ?>
              </span>
            </div>
            <div class="mt-auto d-flex gap-2">
              <a href="<?php echo BASE_URL; ?>pages/listing_detail.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-primary btn-sm">View</a>
              <a href="<?php echo BASE_URL; ?>pages/edit_listing.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-secondary btn-sm">Edit</a>
              <a href="<?php echo BASE_URL; ?>actions/delete_listing.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Delete this listing?');">Delete</a>
            </div>
          </div>
        </div>
      </div>
    <?php endwhile; else: ?>
      <div class="col-12 text-center text-muted py-5">
        <i class="bi bi-house-door fs-1 mb-3"></i><br>
        <span>No listings found. <a href='<?php echo BASE_URL; ?>pages/add_listing.php'>Add your first listing</a>!</span>
      </div>
    <?php endif; ?>
  </div>
</div>
<?php require_once __DIR__ . '/../templates/footer.php'; ?> 