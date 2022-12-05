<?php

class Building {
    protected $flors, $matherial;
    protected function setFlorsNumber($florsNumber)
    {
        if($florsNumber > 20){
            echo 'Количество этажей не может быть больше 20';
            return;
        }
        $this->flors = $florsNumber;

    }
}

class House extends building {
    private $heatingType, $adress;
    public function __construct($florsNumber, $matherial, $heatingType, $adress)
    {
        $this->matherial = $matherial;
        $this->heatingType = $heatingType;
        $this->adress = $adress;
        $this->setFlorsNumber($florsNumber);
    }
    public function showHouseDescription()
    {
        echo $this->matherial . PHP_EOL;
        echo $this->heatingType . PHP_EOL;
        echo $this->adress . PHP_EOL;
    }
}

$sityHouse = new House(21, 'Кирпич', 'Вода', 'Байкальская 188\2');
$sityHouse->showHouseDescription();
