<?php
include_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../templates/header.php';
include_once __DIR__ . '/../includes/db.php';
// Build filter query (basic for now)
$where = "status='approved'";
if (!empty($_GET['city'])) {
  $city = $conn->real_escape_string($_GET['city']);
  $where .= " AND city LIKE '%$city%'";
}
if (!empty($_GET['area'])) {
  $area = $conn->real_escape_string($_GET['area']);
  $where .= " AND area LIKE '%$area%'";
}
if (!empty($_GET['occupancy'])) {
  $occ = $conn->real_escape_string($_GET['occupancy']);
  $where .= " AND occupancy='$occ'";
}
if (!empty($_GET['budget'])) {
  $budget = intval($_GET['budget']);
  $where .= " AND price <= $budget";
}
$sql = "SELECT * FROM listings WHERE $where ORDER BY created_at DESC";
$res = $conn->query($sql);
?>
<div class="container py-5">
  <div class="row">
    <div class="col-md-3">
      <div class="card mb-4">
        <div class="card-body">
          <h5 class="fw-bold mb-3">Filters</h5>
          <form method="get" action="">
            <div class="mb-3">
              <label class="form-label">City</label>
              <input type="text" name="city" class="form-control" placeholder="Enter city" value="<?php echo isset($_GET['city']) ? htmlspecialchars($_GET['city']) : ''; ?>">
            </div>
            <div class="mb-3">
              <label class="form-label">Area</label>
              <input type="text" name="area" class="form-control" placeholder="Enter area" value="<?php echo isset($_GET['area']) ? htmlspecialchars($_GET['area']) : ''; ?>">
            </div>
            <div class="mb-3">
              <label class="form-label">Occupancy</label>
              <select name="occupancy" class="form-select">
                <option value="">Any</option>
                <option value="single" <?php if(isset($_GET['occupancy']) && $_GET['occupancy']==='single') echo 'selected'; ?>>Single</option>
                <option value="shared" <?php if(isset($_GET['occupancy']) && $_GET['occupancy']==='shared') echo 'selected'; ?>>Shared</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Budget (₹)</label>
              <input type="number" name="budget" class="form-control" placeholder="Max budget" value="<?php echo isset($_GET['budget']) ? htmlspecialchars($_GET['budget']) : ''; ?>">
            </div>
            <button type="submit" class="btn btn-primary w-100">Apply Filters</button>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-9">
      <h3 class="mb-4">Search Results</h3>
      <div class="row g-4">
        <?php if ($res && $res->num_rows > 0): while ($row = $res->fetch_assoc()):
          // Fetch first image for this listing
          $img_res = $conn->query("SELECT url FROM images WHERE listing_id=" . intval($row['id']) . " LIMIT 1");
          $img_url = ($img_res && $img_res->num_rows > 0) ? $img_res->fetch_assoc()['url'] : '/assets/images/no-image.png';
          // Fetch amenities
          $am_res = $conn->query("SELECT a.name, a.icon FROM listing_amenities la JOIN amenities a ON la.amenity_id=a.id WHERE la.listing_id=" . intval($row['id']));
        ?>
        <div class="col-md-6 col-lg-4">
          <div class="card shadow-sm h-100" style="border-radius:1.2rem;">
            <img src="<?php echo $img_url; ?>" class="card-img-top" style="height:180px;object-fit:cover;border-radius:1.2rem 1.2rem 0 0;" alt="Listing image">
            <div class="card-body" style="font-family:'Inter',sans-serif;">
              <h5 class="card-title fw-bold mb-2"><?php echo htmlspecialchars($row['name']); ?></h5>
              <div class="mb-2 text-muted" style="font-size:0.97rem;">
                <?php echo htmlspecialchars($row['address']); ?>
              </div>
              <div class="mb-2 fw-bold" style="font-size:1.1rem;">
                ₹<?php echo number_format($row['price']); ?> / month
              </div>
              <div class="mb-2">
                <?php if ($am_res && $am_res->num_rows > 0): while($am = $am_res->fetch_assoc()): ?>
                  <span class="badge bg-light text-dark border me-1"><i class="bi bi-<?php echo htmlspecialchars($am['icon']); ?>"></i> <?php echo htmlspecialchars($am['name']); ?></span>
                <?php endwhile; endif; ?>
              </div>
              <a href="listing_detail.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-primary w-100">View Details</a>
            </div>
          </div>
        </div>
        <?php endwhile; else: ?>
        <div class="col-12 text-center text-muted py-5">
          <i class="bi bi-house-door fs-1 mb-3"></i><br>
          <span>No approved listings found. Try adjusting your filters or add a new listing!</span>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
<?php require_once __DIR__ . '/../templates/footer.php'; ?> 