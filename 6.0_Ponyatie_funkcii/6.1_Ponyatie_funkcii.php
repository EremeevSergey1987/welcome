<?php
function calculeteOperation (int $a, int $b, string $operation = "-") : int
{
    if($operation == "+"){
        return $a + $b;
    }elseif ($operation == "-"){
        return $a - $b;
    }

}
echo calculeteOperation(2, 5);