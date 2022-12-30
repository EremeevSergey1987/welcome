<?php
$testStr = "abracadabra";
$len = strlen($testStr);
for($i=0; $i < $len; $i++){
    if($testStr[$i] === 'b'){
        break;
    }
}
//echo $i + 1;

//////////////////

$numbers = [10,20,71,];
$summ = 0;
foreach ($numbers as $val){
    if($val % 5 !== 0){
        continue;
    }
    $summ += $val;
}
echo $summ;