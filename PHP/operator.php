<?php
$a = 10; 
$b = 5;

$hasilTambah = $a + $b;
$hasilKurang = $a - $b;
$hasilKali = $a * $b;
$hasilBagi = $a / $b;
$sisaBagi = $a % $b;
$pangkat = $a ** $b;

echo "Hasil penjumlahan $a + $b = $hasilTambah<br>";
echo "Hasil pengurangan $a - $b = $hasilKurang<br>";
echo "Hasil perkalian $a * $b = $hasilKali<br>";
echo "Hasil pembagian $a / $b = $hasilBagi<br>";
echo "Sisa bagi $a % $b = $sisaBagi<br>";
echo "Hasil $a pangkat $b = $pangkat<br>";


$hasilSama = $a == $b;
$hasilTidakSama = $a != $b;
$hasilLebihKecil = $a < $b;
$hasilLebihBesar = $a > $b;
$hasilLebihKecilSama = $a <= $b;
$hasilLebihBesarSama = $a >= $b;

echo "Apakah $a sama dengan $b? " . ($hasilSama ? "Ya" : "Tidak") . "<br>";
echo "Apakah $a tidak sama dengan $b? " . ($hasilTidakSama ? "Ya" : "Tidak") . "<br>";
echo "Apakah $a lebih kecil dari $b? " . ($hasilLebihKecil ? "Ya" : "Tidak") . "<br>";
echo "Apakah $a lebih besar dari $b? " . ($hasilLebihBesar ? "Ya" : "Tidak") . "<br>";
echo "Apakah $a lebih kecil atau sama dengan $b? " . ($hasilLebihKecilSama ? "Ya" : "Tidak") . "<br>";
echo "Apakah $a lebih besar atau sama dengan $b? " . ($hasilLebihBesarSama ? "Ya" : "Tidak") . "<br>";


$hasiland = $a && $b; 
$hasilor = $a || $b; 
$hasilNotA = !$a; 
$hasilNotB = !$b;

$hasiland = $a && $b; 
$hasilor = $a || $b; 
$hasilNotA = !$a; 
$hasilNotB = !$b;

echo "Hasil AND antara $a dan $b: " . ($hasiland ? "True" : "False") . "<br>";
echo "Hasil OR antara $a dan $b: " . ($hasilor ? "True" : "False") . "<br>";
echo "Hasil NOT dari $a: " . ($hasilNotA ? "True" : "False") . "<br>";
echo "Hasil NOT dari $b: " . ($hasilNotB ? "True" : "False") . "<br>";

$a += $b;
echo "Hasil $a += $b: $a<br>";
$a -= $b;
echo "Hasil $a -= $b: $a<br>";
$a *= $b;
echo "Hasil $a *= $b: $a<br>";
$a /= $b;
echo "Hasil $a /= $b: $a<br>";
$a %= $b;
echo "Hasil $a %= $b: $a<br>";
?>
