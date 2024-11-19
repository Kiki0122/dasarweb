<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!empty($_SESSION['level'])) {
    require 'config/koneksi.php'; 
    require 'function provisions/pesan_kilat.php';

    include __DIR__ . '/admin/Template/header.php';

    if (!empty($_GET['page'])) {
        include 'admin/module/' . $_GET['page'] . '/index.php'; 
    } else {
        include 'admin/Template/home.php';
    }

    
    include 'admin/Template/footer.php'; 

} else {
    header("Location: login.php");
    exit(); 
}
?>
