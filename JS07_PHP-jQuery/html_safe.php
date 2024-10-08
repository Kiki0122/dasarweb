<?php
// Check if the form is submitted and 'input' exists in $_POST
if (isset($_POST['input']) && isset($_POST['email'])) {
    // Sanitizing input
    $input = htmlspecialchars($_POST['input'], ENT_QUOTES, 'UTF-8');

    // Memeriksa apakah input adalah email yang valid
    $email = $_POST['email'];
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Lanjutkan dengan pengolahan email yang aman
        echo "Email valid: " . htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
    } else {
        // Tangani input yang tidak valid
        echo "Email tidak valid.";
    }
} else {
    echo "Data input atau email belum disubmit.";
}
?>
