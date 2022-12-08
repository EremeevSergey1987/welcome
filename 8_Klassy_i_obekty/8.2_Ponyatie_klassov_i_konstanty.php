<?php
class building{
    const MAX_FLOORS = 20;
    private $floors;

    public function setFloorsMumber($floorNumber){
        echo "Вызван метод - " . __METHOD__ . PHP_EOL;
        if($floorNumber > self::MAX_FLOORS){
            echo "Error" . PHP_EOL;
            return;
        }
        $this->floors = $floorNumber;
    }

    public function showFloorsNumber(){
        echo $this->floors . PHP_EOL;
    }

    public function showKlassName(){
        echo __CLASS__;
    }
}

$building = new building();
//$building->setFloorsMumber(30);
$building->setFloorsMumber(10);
//$building->showFloorsNumber();

//$newBuilding = new building();
//$newBuilding->setFloorsMumber(50);

//$building->showKlassName();

echo $building::class;