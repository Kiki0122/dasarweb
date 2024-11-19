<?php
session_start();

if (!empty($_SESSION['username'])) {
    require '../config/koneksi.php';
    require '../function provisions/pesan_kilat.php';
    require '../function provisions/anti_injection.php';

    if (!empty($_GET['jabatan'])) {
        $id = antiinjection($koneksi, $_GET['id']);
        $query = "DELETE FROM jabatan WHERE id = '$id'";

        if (mysqli_query($koneksi, $query)) {
            pesan('success', "Jabatan Telah Terhapus.");
        } else {
            pesan('danger', "Jabatan Tidak Terhapus Karena: " . mysqli_error($koneksi));
        }

        header("Location: ../index.php?page=jabatan");
        exit;
    }

     // Deletion for anggota
     elseif (!empty($_GET['anggota'])) {
        $id = antiInjection($koneksi, $_GET['id']);

          // First, delete associated data from anggota
          $query2 = "DELETE FROM anggota WHERE user_id = '$id'";
          if (mysqli_query($koneksi, $query2)) {
  
              $query = "DELETE FROM user WHERE id = '$id'";
              if (mysqli_query($koneksi, $query)) {
                  pesan('success', 'Anggota dan Data Login Telah Terhapus.');
              } else {
                  pesan('warning', 'Data Anggota Terhapus, Tetapi Data Login Tidak Terhapus: ' . mysqli_error($koneksi));
              }
          } else {
              pesan('danger', 'Anggota Tidak Terhapus: ' . mysqli_error($koneksi));
          }
 
          header('Location: ../index.php?page=anggota');
          exit;
      }
  } else {
      header('Location: ../index.php'); 
      exit;

}
?>
