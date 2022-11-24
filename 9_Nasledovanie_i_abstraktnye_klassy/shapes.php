<?php
class Squere{
    public static $quantity = 0;
    public static function ChangeQuantity(){
        self::$quantity++;
    }
    public function showQyantity(){
        echo self::$quantity;
    }
}

//echo Squere::$quantity . PHP_EOL;
Squere::ChangeQuantity();
//echo Squere::$quantity . PHP_EOL;

$objSquere = new Squere();
$objSquere->showQyantity();
