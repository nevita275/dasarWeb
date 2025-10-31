<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Praktikum 4 - HTML Injection (Aman)</title>
</head>
<body>
  <h2>Form Input Aman</h2>
  <form method="POST" action="">
    <label>Masukkan Teks:</label><br>
    <input type="text" name="input" /><br><br>

    <label>Masukkan Email:</label><br>
    <input type="text" name="email" /><br><br>

    <input type="submit" value="Kirim" />
  </form>

  <hr>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // LANGKAH 2: cegah HTML injection
    $input = $_POST['input'] ?? '';
    $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');

    echo "<h3>Hasil Input:</h3>";
    echo "Input yang sudah difilter: <b>$input</b><br>";

    // LANGKAH 6: validasi email
    $email = $_POST['email'] ?? '';
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Email valid: <b>" . htmlspecialchars($email, ENT_QUOTES, 'UTF-8') . "</b><br>";
    } else {
        echo "Email tidak valid!<br>";
    }
}
?>
</body>
</html>
