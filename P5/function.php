<?php

function hitungUmur($thn_lahir, $thn_sekarang) {
    $umur = $thn_sekarang - $thn_lahir;
    return $umur;
}
function perkenalan($nama, $salam="Assalamualaikum") {
    echo $salam.", ";
    echo "Perkenalakan, nama saya".$nama."<br/>";
   
    echo "Umur saya adalah ". hitungUmur(1988, 2023) ." tahun<br/>";
    echo "Senang berkenalan dengan Anda<br/>";
}

perkenalan(" Triya");
?>