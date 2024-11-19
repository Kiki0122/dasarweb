<?php
include('koneksi.php'); 

if (isset($_GET['aksi'])) {
    $aksi = $_GET['aksi'];

    if ($aksi == 'tambah') {
        // Validasi dan sanitasi data dari form
        $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
        $jenis_kelamin = mysqli_real_escape_string($koneksi, $_POST['jenis_kelamin']);
        $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
        $no_telp = mysqli_real_escape_string($koneksi, $_POST['no_telp']);

        // Query untuk menambahkan data anggota
        $query = "INSERT INTO anggota (nama, jenis_kelamin, alamat, no_telp) VALUES ('$nama', '$jenis_kelamin', '$alamat', '$no_telp')";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            header('Location: index.php'); 
            exit;
        } else {
            echo 'Gagal menambahkan data: ' . mysqli_error($koneksi);
        }
    } elseif ($aksi == 'ubah') {
        // Proses ubah data anggota 
    } elseif ($aksi == 'hapus') {
        // Proses hapus data anggota
        $id = $_GET['id'];
        $query = "DELETE FROM anggota WHERE id = '$id'";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            header('Location: index.php');
            exit;
        } else {
            echo 'Gagal menghapus data: ' . mysqli_error($koneksi);
        }
    }
}

// Menutup koneksi database
//mysqli_close($koneksi);

if (isset($_GET['aksi']) && $_GET['aksi'] === 'ubah') {
    // Ambil data dari form
    $id = mysqli_real_escape_string($koneksi, $_POST['id']);
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $jenis_kelamin = mysqli_real_escape_string($koneksi, $_POST['jenis_kelamin']);
    $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
    $no_telp = mysqli_real_escape_string($koneksi, $_POST['no_telp']);

    $query = "UPDATE anggota 
              SET nama = '$nama', 
                  jenis_kelamin = '$jenis_kelamin', 
                  alamat = '$alamat', 
                  no_telp = '$no_telp' 
              WHERE id = '$id'";

    if (mysqli_query($koneksi, $query)) {

        header('Location: index.php?pesan=berhasil');
        exit;
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    echo "Aksi tidak valid!";
}
?>
