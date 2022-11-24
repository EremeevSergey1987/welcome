<?php
abstract class Vehicle{
    abstract function move();
}
class Car extends Vehicle{
    function move()
    {
        // TODO: Implement move() method.
        echo "Завести мотор" . PHP_EOL . "Начать движение" . PHP_EOL;
    }
}

class Bicycle extends Vehicle{
    function move()
    {
        // TODO: Implement move() method.
        echo "Крути педали" . PHP_EOL;
    }
}

$car = new Car();
$bicycle = new Bicycle();

$car->move();
$bicycle->move();