<?php
$numbersArray = [1, 2, 3, 4, 5,];
$elemrnts = count($numbersArray);

function trancArray(&$numbersArray, $elemrnts)
{
    for($i = 0; $i<=$elemrnts; $i++){
        if($i % 2 !== 0){
            unset($numbersArray[$i]);
        }
    }

}

trancArray($numbersArray, $elemrnts);
print_r($numbersArray);

