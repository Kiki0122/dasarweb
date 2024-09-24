<?php
// Membuat fungsi untuk menghitung umur
function hitungUmur($thn_lahir, $thn_sekarang) {
    $umur = $thn_sekarang - $thn_lahir; // Menghitung umur
    return $umur; // Mengembalikan nilai umur
}

// Membuat fungsi untuk perkenalan
function perkenalan($nama, $salam = "Assalamualaikum") {
    echo $salam . ", "; // Menampilkan salam
    echo "Perkenalkan, nama saya " . $nama . "<br/>"; // Menampilkan nama
}

// Memanggil fungsi perkenalan
perkenalan("Hayyin");

// Menampilkan umur
echo "Saya berusia " . hitungUmur(2003, 2024) . " tahun<br/>"; // Ganti tahun lahir sesuai kebutuhan
echo "Senang berkenalan dengan Anda<br/>";
?>
