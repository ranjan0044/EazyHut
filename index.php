<?php
// index.php - Eazy Hut Home Page
require_once __DIR__ . '/templates/header.php';
?>

<div class="hero-section">
  <div class="container">
    <div class="text-center mb-4">
      <h1 class="hero-title mb-3">
        Find Your Perfect <span class="gradient">PG Home</span>
      </h1>
      <p class="hero-subtitle">
        Discover premium paying guest accommodations with modern amenities, safety, and comfort. Your home away from home in top cities.
      </p>
    </div>
    <form action="<?php echo BASE_URL; ?>pages/search.php" method="get" class="search-card mx-auto" style="max-width:900px;">
      <div class="row g-3 align-items-end">
        <div class="col-md-3">
          <label class="form-label"><i class="bi bi-geo-alt me-1"></i> Location</label>
          <select name="city" class="form-select">
            <option value="">Select City</option>
            <option>Greater Noida</option>
            <option>Gurgaon</option>
            <option>Noida</option>
            <option>Delhi</option>
          </select>
        </div>
        <div class="col-md-3">
          <label class="form-label"><i class="bi bi-people me-1"></i> Gender</label>
          <select name="gender" class="form-select">
            <option value="">Any Gender</option>
            <option>Male</option>
            <option>Female</option>
            <option>Unisex</option>
          </select>
        </div>
        <div class="col-md-3">
          <label class="form-label"><i class="bi bi-house-door me-1"></i> Occupancy</label>
          <select name="occupancy" class="form-select">
            <option value="">Any Type</option>
            <option>Single</option>
            <option>Double</option>
            <option>Triple</option>
            <option>Quad</option>
          </select>
        </div>
        <div class="col-md-3">
          <label class="form-label">Budget (₹)</label>
          <select name="budget" class="form-select">
            <option value="">Any Budget</option>
            <option>5000-8000</option>
            <option>8000-12000</option>
            <option>12000-15000</option>
            <option>15000+</option>
          </select>
        </div>
      </div>
      <button type="submit" class="search-btn w-100 mt-4 d-flex align-items-center justify-content-center">
        <i class="bi bi-search me-2"></i> Search PG Accommodations
      </button>
    </form>
    <div class="row stats-row justify-content-center">
      <div class="col-6 col-md-3 stat">
        <div class="stat-number stat-1">500+</div>
        <div class="text-muted">Verified PGs</div>
      </div>
      <div class="col-6 col-md-3 stat">
        <div class="stat-number stat-2">1000+</div>
        <div class="text-muted">Happy Residents</div>
      </div>
      <div class="col-6 col-md-3 stat">
        <div class="stat-number stat-3">4</div>
        <div class="text-muted">Cities Covered</div>
      </div>
      <div class="col-6 col-md-3 stat">
        <div class="stat-number stat-4">24/7</div>
        <div class="text-muted">Support</div>
      </div>
    </div>
  </div>
</div>

<div class="featured-section">
  <div class="container">
    <h2 class="featured-title">Featured PG Accommodations</h2>
    <p class="featured-subtitle">Handpicked premium accommodations with best amenities and locations</p>
    <div class="featured-cards">
      <!-- Card 1 -->
      <div class="featured-card position-relative">
        <div style="position:relative;">
          <img src="https://images.pexels.com/photos/1743229/pexels-photo-1743229.jpeg?auto=compress&cs=tinysrgb&w=600" class="featured-card-img" alt="Premium Boys PG in Greater Noida">
          <div class="featured-badges">
            <span class="badge-featured">Featured</span>
            <span class="badge-gender-male">Male</span>
          </div>
        </div>
        <div class="featured-card-content">
          <div class="d-flex justify-content-between align-items-center mb-2">
            <div class="featured-card-title">Premium Boys PG in Greater Noida</div>
            <div class="d-flex align-items-center"><span class="text-warning me-1">★</span>4.8 <span class="text-muted ms-1">(24)</span></div>
          </div>
          <div class="featured-card-location mb-2"><i class="bi bi-geo-alt me-1"></i> Sector 62, Greater Noida</div>
          <div class="d-flex justify-content-between align-items-center mb-2">
            <div class="d-flex align-items-center"><i class="bi bi-people me-1"></i> Single</div>
            <div class="featured-card-price">₹12,000 <span class="text-muted" style="font-size:0.9rem;">per month</span></div>
          </div>
          <div class="featured-card-amenities mb-3">
            <span class="featured-card-amenity"><i class="bi bi-wifi"></i> Wifi</span>
            <span class="featured-card-amenity"><i class="bi bi-car-front"></i> Parking</span>
            <span class="featured-card-amenity"><i class="bi bi-cup-straw"></i> Meals</span>
            <span class="featured-card-amenity"><i class="bi bi-shield-check"></i> Security</span>
          </div>
          <div class="featured-card-actions">
            <a href="#" class="btn btn-primary">View Details</a>
            <a href="#" class="btn btn-outline-primary">Book Now</a>
          </div>
        </div>
      </div>
      <!-- Card 2 -->
      <div class="featured-card position-relative">
        <div style="position:relative;">
          <img src="https://images.pexels.com/photos/1571460/pexels-photo-1571460.jpeg?auto=compress&cs=tinysrgb&w=600" class="featured-card-img" alt="Comfort Girls PG in Gurgaon">
          <div class="featured-badges">
            <span class="badge-featured">Featured</span>
            <span class="badge-gender-female">Female</span>
          </div>
        </div>
        <div class="featured-card-content">
          <div class="d-flex justify-content-between align-items-center mb-2">
            <div class="featured-card-title">Comfort Girls PG in Gurgaon</div>
            <div class="d-flex align-items-center"><span class="text-warning me-1">★</span>4.6 <span class="text-muted ms-1">(18)</span></div>
          </div>
          <div class="featured-card-location mb-2"><i class="bi bi-geo-alt me-1"></i> DLF Phase 3, Gurgaon</div>
          <div class="d-flex justify-content-between align-items-center mb-2">
            <div class="d-flex align-items-center"><i class="bi bi-people me-1"></i> Double</div>
            <div class="featured-card-price">₹15,000 <span class="text-muted" style="font-size:0.9rem;">per month</span></div>
          </div>
          <div class="featured-card-amenities mb-3">
            <span class="featured-card-amenity"><i class="bi bi-wifi"></i> Wifi</span>
            <span class="featured-card-amenity"><i class="bi bi-cup-straw"></i> Meals</span>
            <span class="featured-card-amenity"><i class="bi bi-shield-check"></i> Security</span>
            <span class="featured-card-amenity"><i class="bi bi-droplet"></i> Laundry</span>
          </div>
          <div class="featured-card-actions">
            <a href="#" class="btn btn-primary">View Details</a>
            <a href="#" class="btn btn-outline-primary">Book Now</a>
          </div>
        </div>
      </div>
      <!-- Card 3 -->
      <div class="featured-card position-relative">
        <div style="position:relative;">
          <img src="https://images.pexels.com/photos/1643383/pexels-photo-1643383.jpeg?auto=compress&cs=tinysrgb&w=600" class="featured-card-img" alt="Modern Co-Living in Noida">
          <div class="featured-badges">
            <span class="badge-featured">Featured</span>
            <span class="badge-gender-unisex">Unisex</span>
          </div>
        </div>
        <div class="featured-card-content">
          <div class="d-flex justify-content-between align-items-center mb-2">
            <div class="featured-card-title">Modern Co-Living in Noida</div>
            <div class="d-flex align-items-center"><span class="text-warning me-1">★</span>4.9 <span class="text-muted ms-1">(32)</span></div>
          </div>
          <div class="featured-card-location mb-2"><i class="bi bi-geo-alt me-1"></i> Sector 18, Noida</div>
          <div class="d-flex justify-content-between align-items-center mb-2">
            <div class="d-flex align-items-center"><i class="bi bi-people me-1"></i> Single</div>
            <div class="featured-card-price">₹18,000 <span class="text-muted" style="font-size:0.9rem;">per month</span></div>
          </div>
          <div class="featured-card-amenities mb-3">
            <span class="featured-card-amenity"><i class="bi bi-wifi"></i> Wifi</span>
            <span class="featured-card-amenity"><i class="bi bi-car-front"></i> Parking</span>
            <span class="featured-card-amenity"><i class="bi bi-cup-straw"></i> Meals</span>
            <span class="featured-card-amenity"><i class="bi bi-bar-chart"></i> Gym</span>
          </div>
          <div class="featured-card-actions">
            <a href="#" class="btn btn-primary">View Details</a>
            <a href="#" class="btn btn-outline-primary">Book Now</a>
          </div>
        </div>
      </div>
    </div>
    <div class="text-center mt-4">
      <a href="<?php echo BASE_URL; ?>pages/search.php" class="btn search-btn px-5" style="max-width:350px;">View All PG Accommodations</a>
    </div>
  </div>
</div>

<?php require_once __DIR__ . '/templates/footer.php'; ?> 