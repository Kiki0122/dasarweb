<!DOCTYPE html>
<html>
<head>
    <title>Contoh Form dengan PHP</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h2>Form Contoh</h2>

    <?php
    // Inisialisasi variabel untuk menampung hasil input
    $selectedBuah = "";
    $selectedWarna = [];
    $selectedJenisKelamin = "";

    // Cek apakah form sudah disubmit
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $selectedBuah = $_POST['buah'];
        $selectedWarna = isset($_POST['warna']) ? $_POST['warna'] : [];
        $selectedJenisKelamin = $_POST['jenis_kelamin'];
    
        echo '<div class="result-container">';
        echo '<h3>Hasil Input Anda:</h3>';
        echo '<p><span>Buah yang dipilih:</span> ' . $selectedBuah . '</p>';
    
        if (!empty($selectedWarna)) {
            echo '<p><span>Warna favorit Anda:</span> ' . implode(", ", $selectedWarna) . '</p>';
        } else {
            echo '<p><span>Warna favorit:</span> Anda tidak memilih warna favorit.</p>';
        }
    
        echo '<p><span>Jenis kelamin Anda:</span> ' . $selectedJenisKelamin . '</p>';
        echo '</div>';
    }
    
    ?>

    <form method="POST" action="">
        <label for="buah">Pilih Buah: </label>
        <select name="buah" id="buah">
            <option value="apel" <?php if($selectedBuah == 'apel') echo 'selected'; ?>>Apel</option>
            <option value="pisang" <?php if($selectedBuah == 'pisang') echo 'selected'; ?>>Pisang</option>
            <option value="mangga" <?php if($selectedBuah == 'mangga') echo 'selected'; ?>>Mangga</option>
            <option value="jeruk" <?php if($selectedBuah == 'jeruk') echo 'selected'; ?>>Jeruk</option>
        </select>
        <br><br>

        <label>Pilih Warna Favorit :</label><br>
        <input type="checkbox" name="warna[]" value="merah" <?php if(in_array('merah', $selectedWarna)) echo 'checked'; ?>> Merah<br>
        <input type="checkbox" name="warna[]" value="biru" <?php if(in_array('biru', $selectedWarna)) echo 'checked'; ?>> Biru<br>
        <input type="checkbox" name="warna[]" value="hijau" <?php if(in_array('hijau', $selectedWarna)) echo 'checked'; ?>> Hijau<br>
        <br>

        <label>Pilih Jenis Kelamin :</label><br>
        <input type="radio" name="jenis_kelamin" value="laki-laki" <?php if($selectedJenisKelamin == 'laki-laki') echo 'checked'; ?>> Laki-laki<br>
        <input type="radio" name="jenis_kelamin" value="perempuan" <?php if($selectedJenisKelamin == 'perempuan') echo 'checked'; ?>> Perempuan<br>
        <br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
