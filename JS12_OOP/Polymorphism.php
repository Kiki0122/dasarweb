<?php
interface Shapee
{
    public function calculateArea();
}

class Circlee implements Shapee
{
    private $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function calculateArea() {
        return pi() * pow($this->radius, 2);
    }
}

class Rectangle implements Shapee
{
    private $width;
    private $height;

    public function __construct($width, $height) {
        $this->width = $width;
        $this->height = $height;
    }

    public function calculateArea() {
        return $this->width * $this->height;
    }
}

function printArea(Shapee $shapee) {
    echo "Area: " . $shapee->calculateArea() . "<br>";
}

$circle = new Circlee(5);
$rectangle = new Rectangle(4, 6);

printArea($circlee);
printArea($rectangle);
?>
