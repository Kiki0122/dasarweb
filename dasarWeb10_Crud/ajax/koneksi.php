<?php
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB1', 'anggota');

// Buat Koneksinya
$db1 = new mysqli(HOST, USER, PASS, DB1);

// Cek Koneksi
if ($db1->connect_error) {
    die("Koneksi gagal: " . $db1->connect_error);
}
?>
