<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Initialize variables
    $nama = $_POST["nama"] ?? '';
    $email = $_POST["email"] ?? '';
    $password = $_POST["password"] ?? '';
    $errors = array();

    // Validate Name
    if (empty($nama)) {
        $errors[] = "Nama harus diisi.";
    }

    // Validate Email
    if (empty($email)) {
        $errors[] = "Email harus diisi.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Format email tidak valid.";
    }

    // Validate Password
    if (strlen($password) < 8) {
        $errors[] = "Password harus terdiri dari minimal 8 karakter.";
    }

    // If there are validation errors
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    } else {
        // Continue with data processing if all validations pass
        echo "Data berhasil dikirim: Nama = $nama, Email = $email";
    }
} else {
    echo "Permintaan tidak valid.";
}
?>
