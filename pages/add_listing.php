<?php
include_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../templates/header.php';
?>
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card shadow-lg border-0" style="border-radius:1.5rem;">
        <div class="card-body p-4">
          <h2 class="mb-3 fw-bold" style="font-family:'Inter',sans-serif;">Add New Listing</h2>
          <form method="post" action="<?php echo BASE_URL; ?>actions/add_listing_action.php" enctype="multipart/form-data">
            <div class="mb-3">
              <label class="form-label fw-semibold">PG/Room Name</label>
              <input type="text" name="name" class="form-control" required placeholder="e.g. Sunrise PG, Elite Residency, Sector 21 Room">
            </div>
            <div class="mb-3">
              <label class="form-label fw-semibold">Address <span class="text-muted" style="font-size:0.95em;">(hidden from users)</span></label>
              <input type="text" name="address" class="form-control" required placeholder="Full address for admin/owner only">
            </div>
            <div class="row g-3">
              <div class="col-md-4">
                <label class="form-label fw-semibold">Type</label>
                <select name="is_pg" class="form-select" required>
                  <option value="1">PG</option>
                  <option value="0">Room</option>
                </select>
              </div>
              <div class="col-md-4">
                <label class="form-label fw-semibold">For Gender</label>
                <select name="for_gender" class="form-select" required>
                  <option value="boys">Boys</option>
                  <option value="girls">Girls</option>
                  <option value="unisex">Unisex</option>
                </select>
              </div>
              <div class="col-md-4">
                <label class="form-label fw-semibold">Occupancy</label>
                <select name="occupancy" class="form-select" required>
                  <option value="single">Single</option>
                  <option value="shared">Shared</option>
                </select>
              </div>
            </div>
            <div class="row g-3 mt-3">
              <div class="col-md-6">
                <label class="form-label fw-semibold">City</label>
                <input type="text" name="city" class="form-control" required placeholder="e.g. Delhi">
              </div>
              <div class="col-md-6">
                <label class="form-label fw-semibold">Area</label>
                <input type="text" name="area" class="form-control" required placeholder="e.g. Connaught Place">
              </div>
            </div>
            <div class="mb-3 mt-3">
              <label class="form-label fw-semibold">Price <span class="text-muted" style="font-size:0.95em;">(per month, in ₹)</span></label>
              <input type="number" name="price" class="form-control" required placeholder="e.g. 7000">
            </div>
            <div class="mb-3">
              <label class="form-label fw-semibold">Amenities</label><br>
              <div class="d-flex flex-wrap gap-3">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" name="amenities[]" value="wifi" id="wifi">
                  <label class="form-check-label" for="wifi"><i class="bi bi-wifi"></i> Wifi</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" name="amenities[]" value="parking" id="parking">
                  <label class="form-check-label" for="parking"><i class="bi bi-car-front"></i> Parking</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" name="amenities[]" value="meals" id="meals">
                  <label class="form-check-label" for="meals"><i class="bi bi-cup-straw"></i> Meals</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" name="amenities[]" value="security" id="security">
                  <label class="form-check-label" for="security"><i class="bi bi-shield-check"></i> Security</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" name="amenities[]" value="laundry" id="laundry">
                  <label class="form-check-label" for="laundry"><i class="bi bi-droplet"></i> Laundry</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" name="amenities[]" value="gym" id="gym">
                  <label class="form-check-label" for="gym"><i class="bi bi-bar-chart"></i> Gym</label>
                </div>
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label fw-semibold">Upload Images</label>
              <input type="file" name="images[]" class="form-control" multiple required>
              <div class="form-text">Images will be stored in Supabase (dev: local uploads)</div>
            </div>
            <button type="submit" class="btn btn-primary w-100 fw-bold" style="font-size:1.15rem;">Add Listing</button>
            <div class="form-text mt-2">Owner listings are <b>pending</b> until approved by Admin. Admin listings are auto <b>approved</b>.</div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php require_once __DIR__ . '/../templates/footer.php'; ?> 