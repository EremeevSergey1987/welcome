<?php

//include 'testClass.php';

function __autoload($classname)
{
    include_once './' . $classname . '.php';
}

$testObject = new testClass();
$testObject->testExecution();

$obj = new AnotherClass();
$obj->testExecution();