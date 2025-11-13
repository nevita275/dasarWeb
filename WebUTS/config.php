<?php
$conn = pg_connect("host=localhost dbname=web_artGallery user=postgres password=54321");
if (!$conn) {
    die("Koneksi database gagal.");
}
?>
