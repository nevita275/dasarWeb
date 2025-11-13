<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tambah Karya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
<div class="container">
    <h2>Tambah Karya Baru</h2>
    <form method="post" action="">
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Seniman</label>
            <input type="text" name="artist" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Kategori</label>
            <input type="text" name="category" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Harga</label>
            <input type="number" name="price" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Tanggal Dibuat</label>
            <input type="date" name="created_date" class="form-control" required>
        </div>
        <button type="submit" name="submit" class="btn btn-success">Simpan</button>
        <a href="art_table.php" class="btn btn-secondary">Batal</a>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $title = $_POST['title'];
        $artist = $_POST['artist'];
        $category = $_POST['category'];
        $price = $_POST['price'];
        $created_date = $_POST['created_date'];

        $query = "INSERT INTO artworks (title, artist, category, price, created_date)
                  VALUES ('$title', '$artist', '$category', $price, '$created_date')";
        pg_query($conn, $query);
        header("Location: art_table.php");
    }
    ?>
</div>
</body>
</html>
