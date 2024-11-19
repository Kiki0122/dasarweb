<?php
include 'koneksi.php'; // Pastikan koneksi database sudah benar

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Query untuk menghapus data berdasarkan ID
    $query = "DELETE FROM anggota WHERE id = ?";
    $stmt = $db1->prepare($query);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Data berhasil dihapus";
    } else {
        echo "Terjadi kesalahan saat menghapus data";
    }
}
?>
