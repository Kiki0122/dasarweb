<?php
// Fungsi untuk menampilkan angka dari 1 hingga jumlah yang ditentukan
function tampilkanAngka(int $jumlah, int $indeks = 1) {
    echo "Perulangan ke-{$indeks} <br>";

    // Panggil diri sendiri selama $indeks < $jumlah
    if ($indeks < $jumlah) {
        tampilkanAngka($jumlah, $indeks + 1);
    }
}

// Memanggil fungsi untuk menampilkan angka dari 1 hingga 25
tampilkanAngka(25);
?>
