<?php

$testArray = [1,2,3,4,5,6];
$anotheArray = [0,0,0,0,0,0];

$fp = fopen('example_fw.txt', 'a+');

foreach ($testArray as $item){
    fwrite($fp, $item);
}

foreach ($anotheArray as $item){
    fwrite($fp, $item);
}

fclose($fp);

$content = file_get_contents('example_fw.txt');
echo $content . PHP_EOL;


//file_put_contents('example.txt', $testArray);
//file_put_contents('example.txt', $anotheArray, FILE_APPEND);
//
//$content = file_get_contents('example.txt');
//
//echo $content;