<?php
class Mobil {
    public $brand;

    public function startEngine() {
        echo "Engine started!";
    }
}

$car1 = new Mobil();
$car1->brand = "Toyota";

$car2 = new Mobil();
$car2->brand = "Honda";

$car1->startEngine();
echo $car2->brand;
?>
