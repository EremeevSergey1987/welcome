<?php

trait VehicleFunction
{
    public function ride()
    {
        echo 'Я могу ехать' . PHP_EOL;
    }

    public function Fly()
    {
        echo 'Я могу летать!' . PHP_EOL;
    }
}

trait Car
{
    public function move(){
        echo "Я еду" . PHP_EOL;
    }
}

trait Plane
{
    public function move(){
        echo "Я лечу" . PHP_EOL;
    }
}

class fantomasCar
{
    use Car, Plane {
        //Для разрешения конфликта мы используем метод insteadof
        Car::move insteadof Plane;
        //Для вызова метода из второго трэита мы использовали псевдоним и ключевое слово as
        Plane::move as Fly;
    }
    public function escepe(){
        $this->move();
        $this->Fly();
    }
}

$fantomasCar = new fantomasCar();
$fantomasCar->escepe();
