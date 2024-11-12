<?php
interface Shappe
{
    public function calculateArea();
}

interface Color
{
    public function getColor();
}

class Circlle implements Shappe, Color
{
    private $radius;
    private $color;

    public function __construct($radius, $color) {
        $this->radius = $radius;
        $this->color = $color;
    }

    public function calculateArea() {
        return pi() * pow($this->radius, 2);
    }

    public function getColor() {
        return $this->color;
    }
}

$circle = new Circlle(5, "Blue");

echo "Area of Circle: " . $circle->calculateArea() . "<br>";
echo "Color of Circle: " . $circle->getColor() . "<br>";
?>
