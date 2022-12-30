<?php

class ParentTest {
    protected const TEST_CONST = 'Parent';
    public function showField()
    {
        echo static::TEST_CONST . PHP_EOL;
    }
}

class InheritTeest extends ParentTest {
    protected const TEST_CONST = 'Inherit';
//    public function showField()
//    {
//        echo self::TEST_CONST . PHP_EOL;
//    }
}

$inheritOject = new InheritTeest();
$inheritOject->showField();