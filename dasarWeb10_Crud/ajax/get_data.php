<?php
session_start();
include 'koneksi.php'; 
include 'csrf.php';

// Mengambil ID dari permintaan POST
$id = $_POST['id'];

// Menyiapkan query untuk mengambil data anggota berdasarkan ID
$query = "SELECT * FROM anggota WHERE id=? ORDER BY id DESC"; 
$sql = $db1->prepare($query);

// Mengikat parameter dan mengeksekusi query
$sql->bind_param('i', $id);
$sql->execute();
$res1 = $sql->get_result();

if ($row = $res1->fetch_assoc()) {

    $h['id'] = $row["id"];
    $h['nama'] = $row["nama"];
    $h['jenis_kelamin'] = $row["jenis_kelamin"];
    $h['alamat'] = $row["alamat"];
    $h['no_telp'] = $row["no_telp"];
 
    echo json_encode($h);
} else {
 
    echo json_encode(['error' => 'Data tidak ditemukan']);
}

$db1->close();
?>
