<?php
class Animal {
    public function showMyName(){
        echo "I'm and animal! ";
    }
}
class Cat extends Animal{
    public function showMyName()
    {
        //Вызываем родительский метод
        parent::showMyName();
        echo "I'm a Cat!" . PHP_EOL;
    }
}
class Dog extends Animal {
    public function showMyName()
    {
        parent::showMyName();
        echo "I'm a Dog..." . PHP_EOL;
    }
}

$objCat = new Cat();
$objDog = new Dog();

$objCat->showMyName();
$objDog->showMyName();