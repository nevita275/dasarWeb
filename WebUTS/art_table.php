<?php
// Koneksi PostgreSQL
$host = "localhost";
$port = "5432";
$dbname = "web_artGallery";
$user = "postgres";
$password = "54321";

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$conn) {
    die("Koneksi gagal: " . pg_last_error());
}

// Ambil data artworks
$query = "SELECT * FROM artworks ORDER BY id ASC";
$result = pg_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Karya Seni - Nevi's Art Gallery</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&family=Poppins:wght@300;400;500&display=swap');

        body {
            background: url("bg.jpg") no-repeat center center fixed;
            background-size: cover;
            font-family: "Poppins", sans-serif;
            color: #4b3832;
            margin: 0;
            padding: 0;
        }

        header {
            text-align: center;
            padding: 2rem 1rem;
            background: rgba(245, 237, 225, 0.92);
            border-bottom: 4px solid #b08558;
            border-radius: 0 0 25px 25px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
            backdrop-filter: blur(10px);
        }

        header h1 {
            font-family: 'Playfair Display', serif;
            font-size: 2.8rem;
            color: #3c2f2f;
            letter-spacing: 1px;
            margin-bottom: 0.4rem;
        }

        header p {
            color: #6d4c41;
            font-size: 1.1rem;
            font-style: italic;
        }

        .table-wrapper {
            background: rgba(255, 250, 240, 0.9);
            width: 85%;
            margin: 3rem auto;
            padding: 2rem;
            border-radius: 20px;
            border: 1px solid #d2b48c;
            box-shadow: 0 10px 30px rgba(60, 47, 47, 0.2);
            backdrop-filter: blur(8px);
            position: relative;
        }

        .table-wrapper::before {
            content: "";
            position: absolute;
            top: 10px;
            left: 10px;
            right: 10px;
            bottom: 10px;
            border: 2px dashed #bda27e;
            border-radius: 15px;
            pointer-events: none;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
            font-family: 'Playfair Display', serif;
            font-size: 1.05rem;
            letter-spacing: 0.5px;
        }

        th {
            background-color: #b08968;
            color: #fff8ef;
            padding: 14px;
            border-bottom: 3px solid #8d6e63;
            text-transform: uppercase;
        }

        td {
            padding: 12px;
            border-bottom: 1px solid #d7ccc8;
            background: rgba(255, 255, 255, 0.8);
        }

        tr:nth-child(even) {
            background: rgba(250, 240, 230, 0.8);
        }

        tr:hover {
            background: rgba(224, 190, 148, 0.25);
            transform: scale(1.005);
            transition: all 0.3s ease;
        }

        .back-btn {
            display: block;
            text-align: center;
            width: 220px;
            margin: 2rem auto;
            padding: 12px 0;
            background: linear-gradient(to right, #b58967, #d1a374);
            color: #fff8ef;
            border-radius: 30px;
            text-decoration: none;
            font-weight: bold;
            font-family: 'Poppins', sans-serif;
            box-shadow: 0 6px 20px rgba(90, 60, 40, 0.3);
            transition: all 0.3s ease;
        }

        .back-btn:hover {
            background: linear-gradient(to right, #a87450, #c4976d);
            transform: scale(1.05);
            box-shadow: 0 10px 25px rgba(60, 40, 20, 0.4);
        }

        footer {
            text-align: center;
            color: #6d4c41;
            padding-bottom: 1rem;
            font-style: italic;
        }
    </style>
</head>
<body>
<header>
    <h1>Art Catalog</h1>
    <p>Nevi's Art Gallery</p>
</header>

<div class="table-wrapper">
    <table>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Artist</th>
            <th>Category</th>
            <th>Price (Rp)</th>
            <th>Created Date</th>
        </tr>
        <?php
        if (pg_num_rows($result) > 0) {
            while ($row = pg_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>{$row['id']}</td>";
                echo "<td>{$row['title']}</td>";
                echo "<td>{$row['artist']}</td>";
                echo "<td>{$row['category']}</td>";
                echo "<td>" . number_format($row['price'], 0, ',', '.') . "</td>";
                echo "<td>{$row['created_date']}</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>Tidak ada data karya seni</td></tr>";
        }
        pg_close($conn);
        ?>
    </table>
</div>

<a href="index.html" class="back-btn">← Back to Gallery</a>

<footer>
    © 2025 Nevi's Art Gallery | PostgreSQL Showcase
</footer>
</body>
</html>
