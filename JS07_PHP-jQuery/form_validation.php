<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input dengan Validasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        label {
            margin-bottom: 5px;
            display: block;
            color: #555;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0 15px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            transition: border 0.3s;
        }

        input[type="text"]:focus {
            border: 1px solid #007bff;
            outline: none;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .error {
            color: red;
            margin: 5px 0;
            font-size: 14px;
        }

        .success {
            color: green;
            font-size: 16px;
            margin-top: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Form Input dengan Validasi</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>
            
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required>

            <input type="submit" value="Submit">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nama = trim($_POST["nama"]);
            $email = trim($_POST["email"]);
            $errors = array();

            // Validasi Nama
            if (empty($nama)) {
                $errors[] = "Nama harus diisi.";
            }

            // Validasi Email
            if (empty($email)) {
                $errors[] = "Email harus diisi.";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Format email tidak valid.";
            }

            // Jika ada kesalahan validasi
            if (!empty($errors)) {
                foreach ($errors as $error) {
                    echo "<div class='error'>$error</div>";
                }
            } else {
                // Lanjutkan dengan pemrosesan data jika semua validasi berhasil
                // Misalnya, menyimpan data ke database atau mengirim email
                echo "<div class='success'>Data berhasil dikirim: Nama = $nama, Email = $email</div>";
            }
        }
        ?>
    </div>
</body>
</html>
