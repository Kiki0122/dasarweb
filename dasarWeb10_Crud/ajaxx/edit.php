<?php
include 'koneksi.php'; // Pastikan koneksi sudah benar

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];

    // Query untuk memperbarui data anggota
    $query = "UPDATE anggota SET nama = ?, jenis_kelamin = ?, alamat = ?, no_telp = ? WHERE id = ?";
    $stmt = $db1->prepare($query);
    $stmt->bind_param("ssssi", $nama, $jenis_kelamin, $alamat, $no_telp, $id);

    if ($stmt->execute()) {
        echo "Data berhasil diperbarui";
    } else {
        echo "Terjadi kesalahan saat memperbarui data";
    }
}
?>
