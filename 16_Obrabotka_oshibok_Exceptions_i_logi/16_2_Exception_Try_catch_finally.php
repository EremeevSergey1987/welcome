<?php

class CardNumberException extends Exception {

}

function checkNumberFormat($cartNumber)
{
    if(strlen($cartNumber) !== 16){
        throw new CardNumberException('wrong format!');
    }
    return 'OK' . PHP_EOL;
}

function test(){
    try{
        echo  checkNumberFormat('123457891011123');
    }
    catch (CardNumberException $exception)
    {
        echo $exception->getMessage() . PHP_EOL;
        return false;
    }
    finally
    {
        echo 'Finish' . PHP_EOL;
    }
}

test();
echo 'Super' . PHP_EOL;
