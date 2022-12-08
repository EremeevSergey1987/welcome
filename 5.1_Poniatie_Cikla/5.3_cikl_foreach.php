<?php
//Цикл foeach специвльно создан для перебора массивов или обьектов

$testResult = ['Ivan' => 10, 'Petr' => 45, 'Max' => 32, 'Ser' => 78, 'Irina' => 43, 'Jonny' => 32, 'Kate' => 12, 'Den' => 43, 'Name' => 77, 'Sonia' => 98, 'Red' => 66, 'Silver' => 55];

foreach ($testResult as $key => $value){
    if ($value > 90){
        echo "Кондидат {$key} набрал юолбще 90 баллов\n";
    }
}

$testArr = [1,2,3,];

foreach ($testArr as &$item){
    $item = 0;
}

print_r($testArr);