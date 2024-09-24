<?php

$nama = @$_GET['nama']; // Using @ to suppress errors if the 'nama' key is not present
$usia = @$_GET['usia']; // Using @ to suppress errors if the 'usia' key is not present

echo "Halo {$nama}! Apakah benar anda berusia {$usia} tahun?";
?>
