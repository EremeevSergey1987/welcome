<?php
$testArray = ['one', 'two', 'tree'];

//element_number;

if(isset($_GET['element_number']) && array_key_exists($_GET['element_number'], $testArray)){
    echo $testArray[$_GET['element_number']];
}
else{
    echo 'Параметра нет. Либо задан некорректно.';
}

//message
if(isset($_GET['message'])){
    echo PHP_EOL . $_GET['message'];
}