<?php
require 'authenticate.php';  // proteksi halaman
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $artist = $_POST['artist'];
    $category = $_POST['category'];
    $price = $_POST['price'];

    $imageName = null;
    if (!empty($_FILES['image']['name'])) {
        $imageName = time() . "_" . basename($_FILES['image']['name']);
        $target = 'uploads/' . $imageName;
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
    }

    $stmt = $db->prepare("INSERT INTO artworks (title, artist, category, price, image) VALUES (:t,:a,:c,:p,:i)");
    $stmt->execute([
        ':t' => $title,
        ':a' => $artist,
        ':c' => $category,
        ':p' => $price,
        ':i' => $imageName
    ]);

    header('Location: dashboard.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Tambah Artwork</title>
<link href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.3/dist/sandstone/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5 col-md-6">
  <div class="card p-4 shadow">
    <h3 class="mb-3 text-center">Tambah Artwork</h3>
    <form method="POST" enctype="multipart/form-data">
      <div class="mb-3"><label>Judul</label><input type="text" name="title" class="form-control" required></div>
      <div class="mb-3"><label>Artist</label><input type="text" name="artist" class="form-control"></div>
      <div class="mb-3"><label>Kategori</label><input type="text" name="category" class="form-control"></div>
      <div class="mb-3"><label>Harga</label><input type="number" name="price" class="form-control"></div>
      <div class="mb-3"><label>Gambar</label><input type="file" name="image" accept="image/*" class="form-control"></div>
      <div class="d-flex justify-content-between">
        <a href="dashboard.php" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-success">Simpan</button>
      </div>
    </form>
  </div>
</div>
</body>
</html>
