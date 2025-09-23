<?php
// soal no 5.1
$nilaiSiswa = [85, 92, 78, 64, 90, 55, 88, 79, 70, 96];
$nilaiLulus = [];

foreach ($nilaiSiswa as $nilai) {
    if ($nilai >= 70) {
        $nilaiLulus[] = $nilai;
    }
}
echo "Daftar nilai siswa yang lulus: " . implode(', ', $nilaiLulus);
echo "<br><br>";

// soal no 5.2
$daftarKaryawan = [
    ['Alice', 7],
    ['Bob', 3],
    ['Charlie', 9],
    ['David', 5],
    ['Eva', 6],
];
$karyawanPengalamanLimaTahun = [];

foreach ($daftarKaryawan as $karyawan) {
    if ($karyawan[1] > 5) {
        $karyawanPengalamanLimaTahun[] = $karyawan[0];
    }
}
echo "Daftar karyawan dengan pengalaman kerja lebih dari 5 tahun: " . implode(', ', $karyawanPengalamanLimaTahun);
echo "<br><br>";

// soal no5.3
$daftarNilai = [
    'Matematika' => [
        ['Alice', 85],
        ['Bob', 92],
        ['Charlie', 78],
    ],
    'Fisika' => [
        ['Alice', 90],
        ['Bob', 88],
        ['Charlie', 75],
    ],
    'Kimia' => [
        ['Alice', 92],
        ['Bob', 80],
        ['Charlie', 85],
    ],
];
$mataKuliah = 'Fisika';
echo "Daftar nilai mahasiswa dalam mata kuliah $mataKuliah: <br>";

foreach ($daftarNilai[$mataKuliah] as $nilai) {
    echo "Nama: {$nilai[0]}, Nilai: {$nilai[1]} <br>";
}
echo "<br><br>";

// soal no 5.4
// Data siswa: [nama, nilai]
$siswa = [
    ["Alice", 85],
    ["Bob", 92],
    ["Charlie", 78],
    ["David", 64],
    ["Eva", 90]
];
// Hitung total nilai
$total = 0;
foreach ($siswa as $data) {
    $total += $data[1]; // ambil nilai (indeks ke-1)
}
// Hitung rata-rata
$rataRata = $total / count($siswa);// Tampilkan rata-rata
echo "Rata-rata kelas = $rataRata <br>";
echo "Daftar siswa dengan nilai di atas rata-rata:<br>";
// Cek siapa yang nilainya di atas rata-rata
foreach ($siswa as $data) {
    if ($data[1] > $rataRata) {
        echo "Nama: {$data[0]}, Nilai: {$data[1]} <br>";
    }
}
?>