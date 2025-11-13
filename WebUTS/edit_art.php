<?php
include 'config.php';
$id = $_GET['id'];
$result = pg_query($conn, "SELECT * FROM artworks WHERE id=$id");
$row = pg_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Karya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
<div class="container">
    <h2>Edit Karya</h2>
    <form method="post" action="">
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="title" value="<?= $row['title'] ?>" class="form-control">
        </div>
        <div class="mb-3">
            <label>Seniman</label>
            <input type="text" name="artist" value="<?= $row['artist'] ?>" class="form-control">
        </div>
        <div class="mb-3">
            <label>Kategori</label>
            <input type="text" name="category" value="<?= $row['category'] ?>" class="form-control">
        </div>
        <div class="mb-3">
            <label>Harga</label>
            <input type="number" name="price" value="<?= $row['price'] ?>" class="form-control">
        </div>
        <div class="mb-3">
            <label>Tanggal Dibuat</label>
            <input type="date" name="created_date" value="<?= $row['created_date'] ?>" class="form-control">
        </div>
        <button type="submit" name="update" class="btn btn-primary">Update</button>
        <a href="art_table.php" class="btn btn-secondary">Batal</a>
    </form>

    <?php
    if (isset($_POST['update'])) {
        $title = $_POST['title'];
        $artist = $_POST['artist'];
        $category = $_POST['category'];
        $price = $_POST['price'];
        $created_date = $_POST['created_date'];

        $update = "UPDATE artworks 
                   SET title='$title', artist='$artist', category='$category',
                       price=$price, created_date='$created_date'
                   WHERE id=$id";
        pg_query($conn, $update);
        header("Location: art_table.php");
    }
    ?>
</div>
</body>
</html>
