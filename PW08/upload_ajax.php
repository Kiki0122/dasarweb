<?php
if (isset($_FILES['files'])) {
    $errors = array();
    $allowed_extensions = array("jpg", "jpeg", "png", "gif");
    $max_size = 2 * 1024 * 1024; // 2MB

    // Loop through each file
    foreach ($_FILES['files']['name'] as $key => $file_name) {
        $file_size = $_FILES['files']['size'][$key];
        $file_tmp = $_FILES['files']['tmp_name'][$key];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        // Check for allowed extensions
        if (in_array($file_ext, $allowed_extensions) === false) {
            $errors[] = "$file_name: Ekstensi file yang diizinkan adalah JPG, JPEG, PNG, atau GIF.";
        }

        // Check file size
        if ($file_size > $max_size) {
            $errors[] = "$file_name: Ukuran file tidak boleh lebih dari 2 MB.";
        }

        // If no errors, move the uploaded file
        if (empty($errors)) {
            if (move_uploaded_file($file_tmp, "uploads/" . $file_name)) {
                echo "$file_name: File berhasil diunggah.<br>";
            } else {
                echo "$file_name: Gagal mengunggah file.<br>";
            }
        }
    }

    // If there were errors, display them
    if (!empty($errors)) {
        echo implode("<br>", $errors);
    }
} else {
    echo "Tidak ada file yang diunggah.";
}
?>
