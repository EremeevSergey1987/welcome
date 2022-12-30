<?php

$supportedOperator = ["+", "-", "*"];

function calculeteOperation (int $a, int $b, string $operation = "-") : int
{
    if($operation == "+"){
        return $a + $b;
    }elseif ($operation == "-"){
        return $a - $b;
    }elseif ($operation == "*"){
        return $a * $b;
    }

}

function pasceOperator($userInput, $operator){
    $parceResult = explode($userInput, $operator);
    if($parceResult && count($parceResult) == 2 ){
        return ['operators' => $parceResult, 'operator' => $operator];
    }
    return false;
}

do{
   $userInput = readline("Введите выражение: ");
   foreach ($supportedOperator as $operator){
       $parceResult = pasceOperator($operator, $userInput);
       if($parceResult){
           echo "Результат - " . calculeteOperation(intval($parceResult['operators'][0]), intval($parceResult['operators'][1]), $parceResult['operator']) . PHP_EOL;
       }
   }
}
while(true);
