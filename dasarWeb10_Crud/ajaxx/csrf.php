<?php
session_start();
include 'koneksi.php';  

// Pastikan form mengirim data yang benar
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $nama = stripslashes(strip_tags(htmlspecialchars($_POST['nama'], ENT_QUOTES)));
    $jenis_kelamin = stripslashes(strip_tags(htmlspecialchars($_POST['jenis_kelamin'], ENT_QUOTES)));
    $alamat = stripslashes(strip_tags(htmlspecialchars($_POST['alamat'], ENT_QUOTES)));
    $no_telp = stripslashes(strip_tags(htmlspecialchars($_POST['no_telp'], ENT_QUOTES)));

    if (empty($nama) || empty($jenis_kelamin) || empty($alamat) || empty($no_telp)) {
        echo json_encode(['error' => 'Semua field harus diisi']);
        exit();
    }

    $query = "INSERT INTO anggota (nama, jenis_kelamin, alamat, no_telp) VALUES (?, ?, ?, ?)";
    if ($stmt = $dbi->prepare($query)) {

        $stmt->bind_param("ssss", $nama, $jenis_kelamin, $alamat, $no_telp);

        if ($stmt->execute()) {
            echo json_encode(['success' => 'Sukses menambahkan anggota']);
        } else {
            echo json_encode(['error' => 'Gagal menyimpan data']);
        }
        
        $stmt->close();
    } else {
        echo json_encode(['error' => 'Query gagal dijalankan']);
    }

    $dbi->close();
}
?>
