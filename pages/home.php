<?php
include_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../templates/header.php';
?>
<div class="container mt-5">
  <h2 class="mb-4">Welcome to Eazy Hut</h2>
  <form action="<?php echo BASE_URL; ?>pages/search.php" method="get" class="card card-body shadow-sm p-4 mb-4">
    <div class="row g-3 align-items-end">
      <div class="col-md-3">
        <label class="form-label">City</label>
        <input type="text" name="city" class="form-control" placeholder="Enter city">
      </div>
      <div class="col-md-3">
        <label class="form-label">Area</label>
        <input type="text" name="area" class="form-control" placeholder="Enter area">
      </div>
      <div class="col-md-2">
        <label class="form-label">Occupancy</label>
        <select name="occupancy" class="form-select">
          <option value="">Any</option>
          <option value="single">Single</option>
          <option value="shared">Shared</option>
        </select>
      </div>
      <div class="col-md-2">
        <label class="form-label">Budget (₹)</label>
        <input type="number" name="budget" class="form-control" placeholder="Max budget">
      </div>
      <div class="col-md-2">
        <button type="submit" class="btn btn-success w-100">Search</button>
      </div>
    </div>
  </form>
  <!-- Featured listings will be shown here dynamically -->
</div>
<?php require_once __DIR__ . '/../templates/footer.php'; ?> 