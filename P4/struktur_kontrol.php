<?php
$nilaiNumerik = 92;

if ($nilaiNumerik >= 90 && $nilaiNumerik <= 100) {
    echo "Nilai huruf: A";
} elseif ($nilaiNumerik >= 80 && $nilaiNumerik < 90) {
    echo "Nilai huruf: B";
} elseif ($nilaiNumerik >=70 && $nilaiNumerik < 80) {
    echo "Nilai huruf: C";
} elseif ($nilaiNumerik < 70) {
    echo "Nilai huruf: D";
}
echo "<br><br>";

$jarakSaatIni = 0;
$jarakTarget = 500;
$peningkatanHarian = 30;
$hari = 0;

while ($jarakSaatIni < $jarakTarget) {
    $jarakSaatIni += $peningkatanHarian;
    $hari++;
}

echo "Atlet tersebut memerlukan $hari hari untuk mencapai jarak 500 kilometer.";
echo "<br><br>";

$jumlahLahan = 10;
$tanamanPerlahan = 5;
$buahPerTanaman = 10;
$jumlahBuah = 0;

for ($i = 1; $i <= $jumlahLahan; $i++) { 
    $jumlahBuah += ($tanamanPerlahan * $buahPerTanaman);
}

echo "Jumlah buah yang akan dipanen adalah: $jumlahBuah";
echo"<br><br>";

$skorUjian = [85, 92, 78, 96, 88];
$totalSkor = 0;

foreach ($skorUjian as $skor) {
    $totalSkor += $skor;
}

echo "Total skor ujian adalah: $totalSkor";
echo"<br><br>";

$nilaiSiswa = [85, 92, 58, 64, 90, 55, 88, 79, 70, 96];

foreach ($nilaiSiswa as $nilai) {
    if ($nilai < 60) {
        echo "Nilai: $nilai (Tidak lulus) <br>";
        continue;
    }
    echo "Nilai: $nilai (Lulus) <br>";
}
echo "<br><br>";

// soal cerita saol no4.6
$nilaiSiswa = [85, 92, 78, 64, 90, 75, 88, 79, 70, 96];

// Urutkan dari kecil ke besar
sort($nilaiSiswa);
// Buang 2 nilai terendah
array_shift($nilaiSiswa); // hapus elemen pertama (64)
array_shift($nilaiSiswa); // hapus elemen pertama lagi (70)
// Buang 2 nilai tertinggi
array_pop($nilaiSiswa); // hapus elemen terakhir (96)
array_pop($nilaiSiswa); // hapus elemen terakhir lagi (92)

// Hitung total setelah nilai dibuang
$total = array_sum($nilaiSiswa);

// Hitung rata-rata dari sisa nilai
$rataRata = $total / count($nilaiSiswa);

// Tampilkan hasil
echo "Total nilai setelah membuang 2 nilai tertinggi dan 2 nilai terendah adalah: $total <br>";
echo "Rata-rata nilai = $rataRata";
echo "<br><br>";

// soal cerita soal no4.7
// Harga produk
$harga = 120000;

// Diskon 20% jika harga > 100000
if ($harga > 100000) {
    $diskon = 0.20 * $harga;  // hitung besar diskon
    $hargaAkhir = $harga - $diskon; // harga setelah diskon
} else {
    $hargaAkhir = $harga; // tidak ada diskon
}

// Tampilkan hasil
echo "Harga awal produk: Rp $harga <br>";
echo "Diskon: Rp $diskon <br>";
echo "Harga yang harus dibayar: Rp $hargaAkhir";
echo "<br><br>";

// soal ceritasoal no4.8
// Total poin yang didapat pemain
$poin = 600;
// Baris pertama: tampilkan total skor
echo "Total skor pemain adalah: $poin<br>";
// Baris kedua: cek apakah dapat hadiah tambahan (pakai ternary)
echo "Apakah pemain mendapatkan hadiah tambahan? " . ($poin > 500 ? "YA" : "TIDAK");
?>