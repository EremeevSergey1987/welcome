<?php
function calculeteOperation ($a, $b, $operation = "-")
{
    if($operation == "+"){
        return $a + $b;
    }elseif ($operation == "-"){
        return $a - $b;
    }

}
echo calculeteOperation(2, 5);