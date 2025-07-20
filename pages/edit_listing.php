<?php
include_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../templates/header.php';
// Placeholder: fetch listing data by ID (replace with real DB logic)
$listing = [
  'name' => 'Sunrise PG for Boys',
  'address' => '123 Main St, Connaught Place, Delhi',
  'is_pg' => 1,
  'for_gender' => 'boys',
  'occupancy' => 'single',
  'city' => 'Delhi',
  'area' => 'Connaught Place',
  'price' => 7000,
  'amenities' => ['wifi', 'meals', 'security']
];
?>
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card shadow-lg border-0" style="border-radius:1.5rem;">
        <div class="card-body p-4">
          <h2 class="mb-3 fw-bold" style="font-family:'Inter',sans-serif;">Edit Listing</h2>
          <form method="post" action="<?php echo BASE_URL; ?>actions/edit_listing_action.php" enctype="multipart/form-data">
            <div class="mb-3">
              <label class="form-label fw-semibold">PG/Room Name</label>
              <input type="text" name="name" class="form-control" required value="<?php echo htmlspecialchars($listing['name']); ?>">
            </div>
            <div class="mb-3">
              <label class="form-label fw-semibold">Address <span class="text-muted" style="font-size:0.95em;">(hidden from users)</span></label>
              <input type="text" name="address" class="form-control" required value="<?php echo htmlspecialchars($listing['address']); ?>">
            </div>
            <div class="row g-3">
              <div class="col-md-4">
                <label class="form-label fw-semibold">Type</label>
                <select name="is_pg" class="form-select" required>
                  <option value="1" <?php if($listing['is_pg']) echo 'selected'; ?>>PG</option>
                  <option value="0" <?php if(!$listing['is_pg']) echo 'selected'; ?>>Room</option>
                </select>
              </div>
              <div class="col-md-4">
                <label class="form-label fw-semibold">For Gender</label>
                <select name="for_gender" class="form-select" required>
                  <option value="boys" <?php if($listing['for_gender']==='boys') echo 'selected'; ?>>Boys</option>
                  <option value="girls" <?php if($listing['for_gender']==='girls') echo 'selected'; ?>>Girls</option>
                  <option value="unisex" <?php if($listing['for_gender']==='unisex') echo 'selected'; ?>>Unisex</option>
                </select>
              </div>
              <div class="col-md-4">
                <label class="form-label fw-semibold">Occupancy</label>
                <select name="occupancy" class="form-select" required>
                  <option value="single" <?php if($listing['occupancy']==='single') echo 'selected'; ?>>Single</option>
                  <option value="shared" <?php if($listing['occupancy']==='shared') echo 'selected'; ?>>Shared</option>
                </select>
              </div>
            </div>
            <div class="row g-3 mt-3">
              <div class="col-md-6">
                <label class="form-label fw-semibold">City</label>
                <input type="text" name="city" class="form-control" required value="<?php echo htmlspecialchars($listing['city']); ?>">
              </div>
              <div class="col-md-6">
                <label class="form-label fw-semibold">Area</label>
                <input type="text" name="area" class="form-control" required value="<?php echo htmlspecialchars($listing['area']); ?>">
              </div>
            </div>
            <div class="mb-3 mt-3">
              <label class="form-label fw-semibold">Price <span class="text-muted" style="font-size:0.95em;">(per month, in ₹)</span></label>
              <input type="number" name="price" class="form-control" required value="<?php echo htmlspecialchars($listing['price']); ?>">
            </div>
            <div class="mb-3">
              <label class="form-label fw-semibold">Amenities</label><br>
              <div class="d-flex flex-wrap gap-3">
                <?php $amenities = ['wifi'=>'Wifi','parking'=>'Parking','meals'=>'Meals','security'=>'Security','laundry'=>'Laundry','gym'=>'Gym'];
                $icons = ['wifi'=>'bi-wifi','parking'=>'bi-car-front','meals'=>'bi-cup-straw','security'=>'bi-shield-check','laundry'=>'bi-droplet','gym'=>'bi-bar-chart'];
                foreach($amenities as $key=>$label): ?>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" name="amenities[]" value="<?php echo $key; ?>" id="<?php echo $key; ?>" <?php if(in_array($key, $listing['amenities'])) echo 'checked'; ?>>
                  <label class="form-check-label" for="<?php echo $key; ?>"><i class="bi <?php echo $icons[$key]; ?>"></i> <?php echo $label; ?></label>
                </div>
                <?php endforeach; ?>
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label fw-semibold">Upload Images</label>
              <input type="file" name="images[]" class="form-control" multiple>
              <div class="form-text">Images will be stored in Supabase (dev: local uploads)</div>
            </div>
            <button type="submit" class="btn btn-primary w-100 fw-bold" style="font-size:1.15rem;">Save Changes</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php require_once __DIR__ . '/../templates/footer.php'; ?> 