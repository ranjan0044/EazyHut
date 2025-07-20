<?php
include_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../templates/header.php';
?>
<div class="container py-5">
  <div class="row">
    <div class="col-md-7">
      <div id="listingCarousel" class="carousel slide mb-4" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="/uploads/pg1_1.jpg" class="d-block w-100 rounded" alt="...">
          </div>
          <div class="carousel-item">
            <img src="/uploads/pg1_2.jpg" class="d-block w-100 rounded" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#listingCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#listingCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
    <div class="col-md-5">
      <h3>Sunrise PG for Boys</h3>
      <div class="mb-2 text-muted">Connaught Place, Delhi</div>
      <div class="mb-2">
        <span class="badge bg-primary">Boys</span>
        <span class="badge bg-success">Wifi</span>
        <span class="badge bg-info">Meals</span>
      </div>
      <div class="fw-bold mb-2">
9 7,000 / month</div>
      <div class="mb-3">Spacious PG with all amenities, close to metro and market.</div>
      <a href="#" class="btn btn-primary w-100">Contact Admin to Book</a>
    </div>
  </div>
</div>
<?php require_once __DIR__ . '/../templates/footer.php'; ?> 