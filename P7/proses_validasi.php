<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (strlen($password) < 8) {
        echo "Password kurang dari 8 karakter!";
    } else {
        echo "Data diterima!<br>Nama: $nama<br>Email: $email<br>Password valid.";
    }
}
?>
