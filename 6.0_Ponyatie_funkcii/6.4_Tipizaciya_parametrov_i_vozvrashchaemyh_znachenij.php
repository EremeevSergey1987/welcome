<?php
function displayString(string $str, int $n) : array
{
    $resiltArray = [];
    for($i = 0; $i < $n; $i++){
        $resiltArray[$i] = $str;
    }
    return $resltArray;
}

$resiltArray = displayString("Test string", 3);

foreach ($resiltArray as $item){
    echo $item . PHP_EOL;
}
