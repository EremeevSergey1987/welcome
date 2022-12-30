<?php
$testArray = [1,2,3,4,5,6,7,8,9,];



foreach ($testArray as $key => $value){
    if($value === 6){
        echo 'stop';


    }
}
echo 'finish';