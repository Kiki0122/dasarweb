<?php
// Cocokkan huruf kecil
$pattern = '/[a-z]/';
$text = 'This is a Sample Text.';
if (preg_match($pattern, $text)) {
    echo "Huruf kecil ditemukan!<br>";
} else {
    echo "Tidak ada huruf kecil!<br>";
}

// Cocokkan satu atau lebih digit
$pattern = '/[0-9]+/';
$text = 'There are 123 apples.';
if (preg_match($pattern, $text, $matches)) {
    echo "Cocokkan: " . $matches[0] . "<br>";
} else {
    echo "Tidak ada yang cocok!<br>";
}

// Ganti kata 'apple' dengan 'banana'
$pattern = '/apple/';
$replacement = 'banana';
$text = 'I like apple pie.';
$new_text = preg_replace($pattern, $replacement, $text);
echo $new_text . "<br>"; // Output: "I like banana pie."

// Cocokkan kata 'god', 'good', 'gooood', dll. (Step 14)
$pattern = '/go*d/';
$text = 'god is good.';
if (preg_match($pattern, $text, $matches)) {
    echo "Cocokkan: " . $matches[0] . "<br>";
} else {
    echo "Tidak ada yang cocok!<br>";
}

// Cocokkan kata 'god' atau 'gd' (Step 5.5 - using '?')
$pattern = '/go?d/';
$text = 'god or gd';
if (preg_match($pattern, $text, $matches)) {
    echo "Cocokkan (menggunakan '?'): " . $matches[0] . "<br>";
} else {
    echo "Tidak ada yang cocok!<br>";
}

// Cocokkan antara 2 hingga 4 'o' dalam 'good' atau 'gooood' (Step 5.6 - using '{n,m}')
$pattern = '/go{2,4}d/';
$text = 'goood or gooood';
if (preg_match($pattern, $text, $matches)) {
    echo "Cocokkan (menggunakan '{n,m}'): " . $matches[0] . "<br>";
} else {
    echo "Tidak ada yang cocok!<br>";
}
?>
