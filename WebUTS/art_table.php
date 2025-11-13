<?php
include 'config.php';
$query = "SELECT * FROM artworks ORDER BY id ASC";
$result = pg_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nevi's Art Catalog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow-lg border-0">
        <!-- Bagian Judul -->
        <div class="card-header text-white text-center py-4"
             style="background-color: #8B4513; border-top-left-radius: 10px; border-top-right-radius: 10px;">
            <h2 class="mb-0 fw-bold">🖼️ Nevi's Art Catalog</h2>
        </div>

        <!-- Isi Tabel -->
        <div class="card-body">
            <a href="add_art.php" class="btn btn-success mb-3">
                ➕ Add New Artwork
            </a>

            <table class="table table-hover align-middle text-center">
                <thead style="background-color: #5C4033; color: #fff;">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Artist</th>
                        <th>Category</th>
                        <th>Price (Rp)</th>
                        <th>Created Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (pg_num_rows($result) > 0) {
                        while ($row = pg_fetch_assoc($result)) {
                            echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['title']}</td>
                                <td>{$row['artist']}</td>
                                <td>{$row['category']}</td>
                                <td>" . number_format($row['price'], 0, ',', '.') . "</td>
                                <td>{$row['created_date']}</td>
                                <td>
                                    <a href='edit_art.php?id={$row['id']}' class='btn btn-warning btn-sm'>✏️ Edit</a>
                                    <a href='delete_art.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Delete this artwork?\")'>🗑 Delete</a>
                                </td>
                            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7' class='text-center text-muted'>No artworks available.</td></tr>";
                    }
                    pg_close($conn);
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <a href="index.html" class="d-block mt-3 text-decoration-none text-secondary">← Back to Gallery</a>
</div>

</body>
</html>
