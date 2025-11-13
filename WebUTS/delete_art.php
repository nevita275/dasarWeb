<?php
include 'config.php';
$id = $_GET['id'];
pg_query($conn, "DELETE FROM artworks WHERE id=$id");
header("Location: art_table.php");
?>
