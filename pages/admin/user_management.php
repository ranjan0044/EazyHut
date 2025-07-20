<?php
include_once __DIR__ . '/../../includes/config.php';
require_once __DIR__ . '/../../templates/header.php';
include_once __DIR__ . '/../../includes/db.php';
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
  header('Location: ' . BASE_URL . 'pages/login.php');
  exit();
}
// Handle role update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user_id'], $_POST['role'])) {
  $uid = intval($_POST['user_id']);
  $role = $_POST['role'];
  $allowed = ['admin','pg-owner','room-owner','user'];
  if (in_array($role, $allowed)) {
    $stmt = $conn->prepare('UPDATE users SET role=? WHERE id=?');
    $stmt->bind_param('si', $role, $uid);
    $stmt->execute();
    $stmt->close();
  }
}
$res = $conn->query('SELECT id, name, phone, role FROM users ORDER BY id');
?>
<div class="container py-5">
  <h3 class="mb-4">User Management</h3>
  <div class="card shadow-sm">
    <div class="card-body p-4">
      <table class="table table-hover align-middle">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Role</th>
            <th>Change Role</th>
          </tr>
        </thead>
        <tbody>
          <?php while($row = $res->fetch_assoc()): ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo htmlspecialchars($row['name']); ?></td>
            <td><?php echo htmlspecialchars($row['phone']); ?></td>
            <td><span class="badge bg-secondary"><?php echo $row['role']; ?></span></td>
            <td>
              <form method="post" class="d-flex gap-2 align-items-center">
                <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
                <select name="role" class="form-select form-select-sm">
                  <option value="user" <?php if($row['role']==='user') echo 'selected'; ?>>User</option>
                  <option value="pg-owner" <?php if($row['role']==='pg-owner') echo 'selected'; ?>>PG Owner</option>
                  <option value="room-owner" <?php if($row['role']==='room-owner') echo 'selected'; ?>>Room Owner</option>
                  <option value="admin" <?php if($row['role']==='admin') echo 'selected'; ?>>Admin</option>
                </select>
                <button type="submit" class="btn btn-primary btn-sm">Update</button>
              </form>
            </td>
          </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php require_once __DIR__ . '/../../templates/footer.php'; ?> 