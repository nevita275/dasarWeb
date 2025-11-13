<?php
try {
    $db = new PDO("pgsql:host=localhost;port=5432;dbname=web_artGallery", "postgres", "54321");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}
?>
