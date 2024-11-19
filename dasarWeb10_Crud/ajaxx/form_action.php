<?php
session_start();
include 'koneksi.php';  
include 'carf.php';  

// Mengambil data dari form yang dikirimkan melalui POST
$id = stripslashes(strip_tags(htmlspecialchars($_POST['id'], ENT_QUOTES)));
$nama = stripslashes(strip_tags(htmlspecialchars($_POST['nama'], ENT_QUOTES)));
$jenis_kelamin = stripslashes(strip_tags(htmlspecialchars($_POST['jenis_kelamin'], ENT_QUOTES)));
$alamat = stripslashes(strip_tags(htmlspecialchars($_POST['alamat'], ENT_QUOTES)));
$no_telp = stripslashes(strip_tags(htmlspecialchars($_POST['no_telp'], ENT_QUOTES)));

// Mengecek apakah ID kosong (artinya menambah data baru)
if ($id == "") {
    // Query untuk menambahkan data baru
    $query = "INSERT INTO anggota (nama, jenis_kelamin, alamat, no_telp) VALUES (?, ?, ?, ?)";
    $sql = $db1->prepare($query);
    $sql->bind_param("ssss", $nama, $jenis_kelamin, $alamat, $no_telp);
    $sql->execute();

    echo json_encode(['success' => 'Data berhasil ditambahkan']);
} else {
    // Query untuk memperbarui data berdasarkan ID
    $query = "UPDATE anggota SET nama = ?, jenis_kelamin = ?, alamat = ?, no_telp = ? WHERE id = ?";
    $sql = $db1->prepare($query);
    $sql->bind_param("ssssi", $nama, $jenis_kelamin, $alamat, $no_telp, $id);
    $sql->execute();

    echo json_encode(['success' => 'Data berhasil diperbarui']);
}

$db1->close();
?>
