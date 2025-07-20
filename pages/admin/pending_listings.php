<?php
include_once __DIR__ . '/../../includes/config.php';
require_once __DIR__ . '/../../templates/header.php';
include_once __DIR__ . '/../../includes/db.php';
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
  header('Location: ' . BASE_URL . 'pages/login.php');
  exit();
}
// Handle approve/reject
if (isset($_GET['action'], $_GET['id'])) {
  $id = intval($_GET['id']);
  if ($_GET['action'] === 'approve') {
    $conn->query("UPDATE listings SET status='approved' WHERE id=$id");
  } elseif ($_GET['action'] === 'reject') {
    $conn->query("UPDATE listings SET status='rejected' WHERE id=$id");
  }
  header('Location: pending_listings.php');
  exit();
}
$res = $conn->query("SELECT l.id, l.name, l.address, u.name as owner FROM listings l JOIN users u ON l.owner_id=u.id WHERE l.status='pending' ORDER BY l.created_at DESC");
?>
<div class="container py-5">
  <h3 class="mb-4">Pending Listings</h3>
  <div class="card shadow-sm">
    <div class="card-body p-4">
      <table class="table table-hover align-middle">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Owner</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php while($row = $res->fetch_assoc()): ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo htmlspecialchars($row['name']); ?></td>
            <td><?php echo htmlspecialchars($row['address']); ?></td>
            <td><?php echo htmlspecialchars($row['owner']); ?></td>
            <td>
              <a href="?action=approve&id=<?php echo $row['id']; ?>" class="btn btn-success btn-sm">Approve</a>
              <a href="?action=reject&id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Reject</a>
            </td>
          </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php require_once __DIR__ . '/../../templates/footer.php'; ?> 