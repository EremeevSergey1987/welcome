<?php

function isValidNumber($n){
    return $n % 3 == 0;
}

function displayResult ($n, $isValidNumber){
    if($isValidNumber){
        echo "Число {$n} делится на 3" . PHP_EOL;
    }else{
        echo "Число {$n} не делится на 3" . PHP_EOL;
    }
}

for($i = 1; $i <= 100; $i++){
    displayResult($i, isValidNumber($i));
}