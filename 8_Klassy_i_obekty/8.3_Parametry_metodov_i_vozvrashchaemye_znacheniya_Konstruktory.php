<?php
class testClass{
    private $testField_1, $testField_2;

    public function setValues(){
        $this->testField_1 = "This is";
        $this->testField_2 = "test";
    }

    public function showFields(){
        $this->setValues();
        echo $this->testField_1 . ' ' . $this->testField_2 . PHP_EOL;
    }
}

$testObject = new testClass();
$testObject->setValues();

function showFields(){
    showFields();
    $testField_1 = "test";
    echo $testField_1 . PHP_EOL;
}
showFields();

$testObject->showFields();

