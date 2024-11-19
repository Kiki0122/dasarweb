<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include "config/koneksi.php";
include "function provisions/pesan_kilat.php";
include "function provisions/anti_injection.php";

$username = antiinjection($koneksi, $_POST['username']);
$password = antiinjection($koneksi, $_POST['password']);

$query = "SELECT username, level, salt, password as hashed_password FROM user WHERE username = '$username'";
$result = mysqli_query($koneksi, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    mysqli_close($koneksi);

    $salt = $row['salt'];
    $hashed_password = $row['hashed_password'];

    var_dump($password, $hashed_password, $salt); 

    if ($salt !== null && $hashed_password !== null) {
        $combined_password = $salt . $password;

        if (password_verify($combined_password, $hashed_password)) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['level'] = $row['level'];
            header("Location: index.php");
            exit();
        } else {
            pesan('danger', "Login gagal. Password Anda Salah.");
            header("Location: login.php");
            exit();
        }
        if ($row = mysqli_fetch_assoc($result)) {
    } else {
        pesan('warning', "Username tidak ditemukan.");
        header("Location: login.php");
        exit();
    }
} else {
    pesan('danger', "Terjadi kesalahan saat melakukan query.");
    header("Location: login.php");
    exit();
}
}
?>
