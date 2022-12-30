<?php

class Employee
{
    public $name, $position, $age;
    public function setParametrs($name, $position, $age){
        $this->name = $name;
        $this->position = $position;
        $this->age = $age;
    }
    public function showEmployeeInfo(){
        echo 'Сотрудник ' . $this->name . ' в должности ' . $this->position . PHP_EOL;
    }
}

class Accountant extends Employee {
    public function prepareReport(){
        echo "Я готовлю отчет ";

    }
}

class CEO extends Employee {
    public function fireEmployee($name){
        echo "Я уволил " . $name . PHP_EOL;

    }
}

class Welder extends Employee {
    public function makeWelder(){
        echo "Я свариваю" . PHP_EOL;

    }
}

$accountant = new Accountant();
$accountant->setParametrs('Ivan', 'GlavBuh', 30);
$accountant->prepareReport();
$accountant->showEmployeeInfo();