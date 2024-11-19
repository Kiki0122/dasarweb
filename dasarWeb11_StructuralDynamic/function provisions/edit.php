<?php
session_start();

if (!empty($_SESSION['username'])) {
    require '../config/koneksi.php'; 
    require '../function provisions/pesan_kilat.php'; 
    require '../function provisions/anti_injection.php'; 

    if (!empty($_GET['jabatan'])) {
        // Mengambil data dari form yang dikirim melalui POST
        $id = antiinjection($koneksi, $_POST['id']);
        $jabatan = antiinjection($koneksi, $_POST['jabatan']);
        $keterangan = antiinjection($koneksi, $_POST['keterangan']);

        $query = "UPDATE jabatan SET jabatan = '$jabatan', keterangan = '$keterangan' WHERE id = '$id'";

        // Mengeksekusi query
        if (mysqli_query($koneksi, $query)) {
            // Jika berhasil, tampilkan pesan sukses
            pesan('success', "Jabatan Telah Diubah.");
        } else {
            // Jika gagal, tampilkan pesan error dengan alasan
            pesan('danger', "Mengubah Jabatan Karena: " . mysqli_error($koneksi));
        }

        header('Location: ../index.php?page=jabatan');
    exit;
}
}  else {
    header('Location: ../index.php'); // Redirect to login if not authenticated
exit;
}

// Check if editing anggota
if (!empty($_GET['anggota']) && $_GET['anggota'] === 'edit') {
    // Retrieve and sanitize form data
    $user_id = antiInjection($koneksi, $_POST['id']);
    $username = antiInjection($koneksi, $_POST['username']);
    $nama = antiInjection($koneksi, $_POST['nama']);
    $jabatan = antiInjection($koneksi, $_POST['jabatan']);
    $jenis_kelamin = antiInjection($koneksi, $_POST['jenis_kelamin']);
    $alamat = antiInjection($koneksi, $_POST['alamat']);
    $no_telp = isset($_POST['no_tel']) ? antiInjection($koneksi, $_POST['no_tel']) : ''; // Set to empty if no_tel not in POST

    // Check if `no_tel` column exists in `anggota` table
    $result = mysqli_query($koneksi, "SHOW COLUMNS FROM anggota LIKE 'no_tel'");
    $has_no_tel_column = mysqli_num_rows($result) > 0;

    // Construct the anggota update query based on column existence
    $query_anggota = "UPDATE anggota SET 
                      nama = '$nama', 
                      jenis_kelamin = '$jenis_kelamin', 
                      alamat = '$alamat', 
                      jabatan_id = '$jabatan'";

    if ($has_no_tel_column) {
        $query_anggota .= ", no_tel = '$no_telp'";
    }

    $query_anggota .= " WHERE user_id = '$user_id'";

    // Execute the anggota update query
    if (mysqli_query($koneksi, $query_anggota)) {
        // Update password if provided
        if (!empty($_POST['password'])) {
            $password = $_POST['password'];
            $salt = bin2hex(random_bytes(6));
            $combined_password = $salt . $password;
            $hashed_password = password_hash($combined_password, PASSWORD_BCRYPT);

            // Update user table with new username, hashed password, and salt
            $query_user = "UPDATE user SET 
                           username = '$username', 
                           password = '$hashed_password', 
                           salt = '$salt' 
                           WHERE id = '$user_id'";

            if (mysqli_query($koneksi, $query_user)) {
                pesan('success', 'Anggota dan Password Berhasil Diperbarui.');
            } else {
                pesan('warning', 'Data Anggota Diperbarui, tetapi Gagal Memperbarui Password: ' . mysqli_error($koneksi));
            }
        } else {
            // Only update username if password is not provided
            $query_user = "UPDATE user SET username = '$username' WHERE id = '$user_id'";

            if (mysqli_query($koneksi, $query_user)) {
                pesan('success', 'Anggota Berhasil Diperbarui.');
            } else {
                pesan('warning', 'Data Anggota Diperbarui, tetapi Gagal Memperbarui Username: ' . mysqli_error($koneksi));
            }
        }
    } else {
        pesan('danger', 'Gagal Memperbarui Anggota: ' . mysqli_error($koneksi));
    }

    // Redirect to anggota page after update
    header('Location: ../index.php?page=anggota');
    exit;
}
    else {
        header('Location: ../index.php'); // Redirect to login if not authenticated
    exit;
}
?>
