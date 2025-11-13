<?php
require 'authenticate.php';
require 'config.php';

$stmt = $db->query("SELECT * FROM artworks ORDER BY id DESC");
$artworks = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Dashboard - Gallery</title>
<link href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.3/dist/sandstone/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="#">Dashboard Admin</a>
    <div class="d-flex">
      <a href="index.php" class="btn btn-outline-light me-2">← Back to Gallery</a>
      <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
  </div>
</nav>

<div class="container mt-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="fw-semibold">Daftar Artwork</h3>
    <a href="add_art.php" class="btn btn-success">+ Tambah Artwork</a>
  </div>

  <div class="row">
    <?php if (count($artworks) > 0): ?>
      <?php foreach ($artworks as $art): ?>
        <div class="col-md-4 mb-4">
          <div class="card shadow-sm">
            <img src="uploads/<?php echo htmlspecialchars($art['image']); ?>" class="card-img-top" style="height:250px; object-fit:cover;">
            <div class="card-body">
              <h5 class="card-title"><?php echo htmlspecialchars($art['title']); ?></h5>
              <p class="card-text text-muted"><?php echo htmlspecialchars($art['artist']); ?> - Rp<?php echo number_format($art['price'], 0, ',', '.'); ?></p>
              <div class="d-flex justify-content-between">
                <a href="edit_art.php?id=<?php echo $art['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="delete_art.php?id=<?php echo $art['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <div class="alert alert-info text-center">Belum ada data karya seni.</div>
    <?php endif; ?>
  </div>
</div>
<footer class="text-center py-3 mt-4 bg-light border-top">
  <small>Nevi's Art Gallery Dashboard &copy; 2025</small>
</footer>
</body>
</html>
