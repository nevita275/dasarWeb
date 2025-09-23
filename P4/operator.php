<?php
$a = 10;
$b = 5;

$hasilTambah = $a + $b;
$hasilKurang = $a - $b;
$hasilKali = $a * $b;
$hasilBagi = $a / $b;
$sisaBagi = $a % $b;
$pangkat = $a ** $b;

echo "Penjumlahan: $a + $b = " . ($a + $b) . "<br>";
echo "Pengurangan: $a - $b = " . ($a - $b) . "<br>";
echo "Perkalian: $a * $b = " . ($a * $b) . "<br>";
echo "Pembagian: $a / $b = " . ($a / $b) . "<br>";
echo "Sisa Bagi: $a % $b = " . ($a % $b) . "<br><br>";

$hasilSama = $a == $b;
$hasilTidakSama = $a != $b;
$hasilLebihKecil = $a < $b;
$hasilLebihBesar = $a > $b;
$hasilLebihKecilSama = $a <= $b;
$hasilLebihBesarSama = $a >= $b;

echo "Apakah a sama dengan b? "; var_dump($a == $b);
echo "<br>";
echo "Apakah a tidak sama dengan b? "; var_dump($a != $b);
echo "<br>";
echo "Apakah a lebih kecil dari b? "; var_dump($a < $b);
echo "<br>";
echo "Apakah a lebih besar dari b? "; var_dump($a > $b);
echo "<br>";
echo "Apakah a lebih kecil sama dengan b? "; var_dump($a <= $b);
echo"<br>";
echo "Apakah a lebih besar sama dengan b? "; var_dump($a >= $b);

$hasilAnd = $a && $b;
$hasilOr = $a || $b;
$hasilNotA = !$a;
$hasilNotaB = !$b;

echo "<br><br>";
echo "Apakah a di atas 18 DAN b kurang dari 10? "; var_dump($a > 18 && $b < 10);
echo "<br>";
echo "Apakah a di atas 18 ATAU b kurang dari 10? "; var_dump($a > 18 || $b < 10);
echo "<br>";
echo "Apakah a bernilai false? "; var_dump(!$a);
echo "<br>";
echo "Apakah b bernilai false? "; var_dump(!$b);
echo "<br><br>";

$a += $b;
echo "Setelah a += b, nilai a = $a <br>";

$a -= $b;
echo "Setelah a -= b, nilai a = $a <br>";

$a *= $b;
echo "Setelah a *= b, nilai a = $a <br>";

$a /= $b;
echo "Setelah a /= b, nilai a = $a <br>";

$a %= $b;
echo "Setelah a %= b, nilai a = $a <br>";

$hasilIdentik = $a === $b;
$hasilTidakIdentik = $a !== $b;

echo "<br>Apakah a identik dengan b (===)? "; var_dump($hasilIdentik);
echo "<br>Apakah a tidak identik dengan b (!==)? "; var_dump($hasilTidakIdentik);
echo "<br><br>";

$totalKursi = 45;
$kursiTerisi = 28;

$kursiKosong = $totalKursi - $kursiTerisi;
$persenKosong = ($kursiKosong / $totalKursi) * 100;

echo "Total kursi: $totalKursi <br>";
echo "Kursi terisi: $kursiTerisi <br>";
echo "Kursi kosong: $kursiKosong <br>";
echo "Persentase kursi kosong: " . round($persenKosong, 2) . "%";

?>
