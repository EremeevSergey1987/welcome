<?php

function test($n){
    try{

        if(strlen($n) !== 16){
            throw new Exception('wrong format!');
        }
        echo 'OK' . PHP_EOL;

    }
    catch (Exception $exception)
    {
        echo $exception->getMessage() . PHP_EOL;
        return false;
    }
    finally
    {
        echo 'Finish' . PHP_EOL;
    }
}

test($n = 123457891011123);
echo 'Super' . PHP_EOL;
