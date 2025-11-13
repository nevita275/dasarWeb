<?php
require 'authenticate.php';
require 'config.php';

$id = $_GET['id'] ?? null;

if ($id) {
    $q = $db->prepare('SELECT image FROM artworks WHERE id=:id');
    $q->execute([':id'=>$id]);
    $r = $q->fetch(PDO::FETCH_ASSOC);

    if ($r && $r['image'] && file_exists('uploads/'.$r['image'])) {
        unlink('uploads/'.$r['image']);
    }

    $del = $db->prepare('DELETE FROM artworks WHERE id=:id');
    $del->execute([':id'=>$id]);
}

header('Location: dashboard.php');
exit();
?>
