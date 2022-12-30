<?php
$visibleString = 'Test';

$testOutput = function () use (&$visibleString)
{

    $visibleString = 'erwe';
//    if(strlen($visibleString) > 0){
//        for($i = 0; $i < strlen($visibleString); $i++){
//            echo $visibleString[$i] . PHP_EOL;
//        }
//    }
};

$testOutput();
echo $visibleString;
