<?php
function h($string) {
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}
$pattern1 = '/[a-z]/'; 
$text1 = 'This is a Sample Text.'; 

echo "<h3>Cek huruf kecil</h3>";
echo "Teks: <code>" . htmlspecialchars($text1, ENT_QUOTES, 'UTF-8') . "</code><br>";

if (preg_match($pattern1, $text1)) {
    echo "<b>Huruf kecil ditemukan!</b><br>";
} else {
    echo "<b>Tidak ada huruf kecil!</b><br>";
}
echo "<hr>";

$pattern2 = '/[0-9]+/';
$text2 = 'There are 123 apples.';
echo "<h3>Cari digit (satu atau lebih)</h3>";
echo "Teks: <code>" . htmlspecialchars($text2, ENT_QUOTES, 'UTF-8') . "</code><br>";
if (preg_match($pattern2, $text2, $matches2)) {
    echo "<b>Cocokkan pertama: </b>" . htmlspecialchars($matches2[0], ENT_QUOTES, 'UTF-8') . "<br>";
    preg_match_all($pattern2, $text2, $all2);
} else {
    echo "<b>Tidak ada yang cocok!</b><br>";
}
echo "<hr>";

$pattern3 = '/apple/';
$replacement3 = 'banana';
$text3 = 'I like apple pie.';
$new_text3 = preg_replace($pattern3, $replacement3, $text3);
echo "<h3>preg_replace</h3>";
echo "Teks: <code>" . h($text3) . "</code><br>";
echo "<b>Hasil preg_replace:</b> <code>" . h($new_text3) . "</code><br>";
echo "<hr>";

$pattern4 = '/go*d/';
$text4_examples = ['god is good.'];
echo "<h3>Cek pattern <code>/go*d/</code></h3>";
echo "Pattern: <code>$pattern4</code><br>";
foreach ($text4_examples as $t) {
    echo "Teks: <code>" . h($t) . "</code> — ";
    if (preg_match($pattern4, $t, $m4)) {
        echo "Cocok: <b>" . h($m4[0]) . "</b><br>";
    } else {
        echo "Tidak ada yang cocok<br>";
    }
}
echo "<hr>";

$pattern_q = '/colou?r/'; 
$tests_q = ['color', 'colour', 'colouur', 'colr'];
echo "<h3>Soal 5.5 — Pattern dengan <code>?</code> (0 atau 1 kali)</h3>";
echo "Pattern contoh: <code>$pattern_q</code> (u optional)<br>";
foreach ($tests_q as $t) {
    echo "Teks: <code>" . h($t) . "</code> — ";
    if (preg_match($pattern_q, $t, $mq)) {
        echo "Cocok: <b>" . h($mq[0]) . "</b><br>";
    } else {
        echo "Tidak cocok<br>";
    }
}
echo "<hr>";

$pattern_nm = '/a{2,4}/';
$tests_nm = ['aa', 'aaa', 'aaaa', 'a', 'aaaaa', 'baaaab'];
echo "<h3>Soal 5.6 — Pattern dengan <code>{n,m}</code> (n sampai m kali)</h3>";
echo "Pattern contoh: <code>$pattern_nm</code> (cari 'a' 2 sampai 4 kali berturut-turut)<br>";
foreach ($tests_nm as $t) {
    echo "Teks: <code>" . h($t) . "</code> — ";
    if (preg_match($pattern_nm, $t, $mn)) {
        echo "Cocok: <b>" . h($mn[0]) . "</b><br>";
    } else {
        echo "Tidak cocok<br>";
    }
}
?>