<?php
require 'authenticate.php';  // proteksi halaman
require 'config.php';

$id = $_GET['id'] ?? null;
if (!$id) { header('Location: dashboard.php'); exit(); }

$stmt = $db->prepare('SELECT * FROM artworks WHERE id = :id');
$stmt->execute([':id'=>$id]);
$art = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$art) { header('Location: dashboard.php'); exit(); }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $artist = $_POST['artist'];
    $category = $_POST['category'];
    $price = $_POST['price'];

    $imageName = $art['image'];
    if (!empty($_FILES['image']['name'])) {
        if ($imageName && file_exists('uploads/'.$imageName)) unlink('uploads/'.$imageName);
        $imageName = time()."_".basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/'.$imageName);
    }

    $upd = $db->prepare('UPDATE artworks SET title=:t, artist=:a, category=:c, price=:p, image=:i WHERE id=:id');
    $upd->execute([':t'=>$title, ':a'=>$artist, ':c'=>$category, ':p'=>$price, ':i'=>$imageName, ':id'=>$id]);

    header('Location: dashboard.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Edit Artwork</title>
<link href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.3/dist/sandstone/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5 col-md-6">
  <div class="card p-4 shadow">
    <h3 class="mb-3 text-center">Edit Artwork</h3>
    <form method="POST" enctype="multipart/form-data">
      <div class="mb-3"><label>Judul</label><input type="text" name="title" class="form-control" value="<?php echo htmlspecialchars($art['title']); ?>" required></div>
      <div class="mb-3"><label>Artist</label><input type="text" name="artist" class="form-control" value="<?php echo htmlspecialchars($art['artist']); ?>"></div>
      <div class="mb-3"><label>Kategori</label><input type="text" name="category" class="form-control" value="<?php echo htmlspecialchars($art['category']); ?>"></div>
      <div class="mb-3"><label>Harga</label><input type="number" name="price" class="form-control" value="<?php echo htmlspecialchars($art['price']); ?>"></div>
      <div class="mb-3"><label>Gambar Lama</label><br><img src="uploads/<?php echo htmlspecialchars($art['image']); ?>" width="120"></div>
      <div class="mb-3"><label>Ganti Gambar</label><input type="file" name="image" accept="image/*" class="form-control"></div>
      <div class="d-flex justify-content-between">
        <a href="dashboard.php" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </form>
  </div>
</div>
</body>
</html>
