<?php
// Membuat fungsi 
function perkenalan($nama, $salam = "Assalamualaikum") {
    echo $salam . ", ";
    echo "Perkenalkan, nama saya " . $nama . "<br/>";
    echo "Senang berkenalan dengan Anda<br/>";
}

// Memanggil fungsi yang sudah dibuat 
perkenalan("Hayyin", "Hallo");
echo "<hr>";

// Menetapkan variabel
$saya = "Baihaki";
$ucapanSalam = "Selamat pagi";

// Memanggil lagi tanpa mengisi parameter salam
perkenalan($saya);
?>
