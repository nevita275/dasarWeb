<?php
require 'config.php';

$stmt = $db->query('SELECT * FROM artworks ORDER BY id DESC');
$arts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Nevi's Art Gallery</title>
<link href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.3/dist/sandstone/bootstrap.min.css" rel="stylesheet">
<style>.art-img{height:220px;object-fit:cover;border-radius:8px}</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand">Nevi's Art Gallery</a>
    <div class="d-flex">
      <a href="login.php" class="btn btn-outline-light btn-sm">Login</a>
    </div>
  </div>
</nav>
<div class="container mt-5">
  <div class="row">
    <?php foreach($arts as $a): ?>
      <div class="col-md-4 mb-4">
        <div class="card shadow-sm">
          <img src="uploads/<?php echo htmlspecialchars($a['image']); ?>" class="card-img-top art-img" alt="">
          <div class="card-body">
            <h5><?php echo htmlspecialchars($a['title']); ?></h5>
            <p class="text-muted"><?php echo htmlspecialchars($a['artist']); ?> — <?php echo htmlspecialchars($a['category']); ?></p>
            <p><strong>Rp <?php echo number_format($a['price'],0,',','.'); ?></strong></p>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
<footer class="bg-dark text-light text-center py-3 mt-4"><div class="container">Nevi's Art Gallery</div></footer>
</body>
</html>
