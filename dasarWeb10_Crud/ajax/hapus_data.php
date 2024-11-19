<?php
include 'koneksi.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $query = "DELETE FROM anggota WHERE id = ?";
    $sql = $db1->prepare($query);
    $sql->bind_param("i", $id);

    if ($sql->execute()) {
        echo json_encode(['success' => 'Data berhasil dihapus']);
    } else {
        echo json_encode(['error' => 'Gagal menghapus data']);
    }
}
$db1->close();
?>
