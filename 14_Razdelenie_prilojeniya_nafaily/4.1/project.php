<?php

function loaderLibOne($className)
{
    if(file_exists('library_one/' . $className . '.php')){
        require_once 'library_one/' . $className . '.php';
    }

}

function loaderLibTwo($className)
{
    if(file_exists('library_two/' . $className . '.php')) {
        require_once 'library_two/' . $className . '.php';
    }
}


spl_autoload_register('loaderLibTwo');
spl_autoload_register('loaderLibOne');


$objFirstClass = new FirstClass();
$objFirstClass->echoAnotherClass();

$anOtherClass = new AnotherClass();
$anOtherClass->echoAnotherClass();

