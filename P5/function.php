<?php

function perkenalan($nama, $salam) {
    echo $salam.", ";
    echo "Perkenalakan, nama saya".$nama."<br/>";
    echo "Senang berkenalan dengan Anda<br/>";
}
 
perkenalan(" Triya", "Hallo");

echo"<hr>";

$saya = " Triya";
$ucapansalam = "Selamat pagi";

perkenalan($saya, $ucapansalam);
?>