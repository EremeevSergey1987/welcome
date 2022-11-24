<?php
trait VehicleFunction{
    public function ride(){
        echo 'Я могу ехать' . PHP_EOL;
    }
    public function Fly(){
        echo 'Я могу летать!' . PHP_EOL;
    }
}

class Car{
    use VehicleFunction;
}

class Plane{
    use VehicleFunction;
}

class fantomasCar{
    use VehicleFunction;
    public function escepe(){
        $this->ride();
        $this->Fly();
    }
}

$fantomasCar = new fantomasCar();
$fantomasCar->escepe();
