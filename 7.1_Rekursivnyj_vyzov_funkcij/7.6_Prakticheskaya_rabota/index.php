<?php
$searchRoot = 'first_dir';
$searchName = 'test.txt';
$searchResult = [];

function serchFile($searchRoot, $searchName, &$searchResult){
    $listElementDir = scandir('first_dir');
    print_r($listElementDir);
    var_dump(is_dir($listElementDir[0]));
}

$listElementDir = scandir('first_dir\.');
print_r($listElementDir);
var_dump(is_dir($listElementDir[1]));

if($listElementDir[2] === $searchName){
    echo 'Файл найден!';
}
else{
    echo 'Файл не найден!';
}