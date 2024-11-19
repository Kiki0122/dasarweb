<?php
include 'koneksi.php';  // Pastikan koneksi sudah benar

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Ambil data anggota berdasarkan ID
    $query = "SELECT * FROM anggota WHERE id = ?";
    $stmt = $db1->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // Kirim data anggota dalam format JSON
        echo json_encode($row);
    } else {
        echo json_encode(['error' => 'Data tidak ditemukan']);
    }

    //$stmt->close();
    $db1->close();
}
?>
