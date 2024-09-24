<?php
// Membuat fungsi
function hitungUmur($thn_lahir, $thn_sekarang) {
    $umur = $thn_sekarang - $thn_lahir; 
    return $umur; 
}

echo "Umur saya adalah " . hitungUmur(2003, 2024) . " tahun"
?>
