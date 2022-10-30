<?php
$list[0] = 'Овощи';
$list[1] = 'Фрукты';
$list[2] = 'Ягоды';

//print_r($list[1]);

$list2[] = 'a';
$list2[] = 'b';
$list2[] = 'c';


//print_r($list2);
//print_r($list2[1]);

$arr['vegan'] = 'morcovka';
$arr['fr'] = 'apelsin';
$arr['yagodi'] = 'clubnica';

//print_r($arr);
//print_r($arr['fr']);

$list2 = [1,2,3,4,5,6];
//print_r($list2[1]);

$list3 = ['fr'=>'apple', 're' => 'ref', 'ds' => 'rrr'];
//print_r($list3);

$a = sizeof($list2);
//var_dump($a);

$b = count($list3);
//var_dump($b);

$str = 'Hello, world';
$mass = explode(', ', $str);
print_r($mass);

$mass2 = explode('324', $str);
print_r($mass2);

$mass3 = [1,2,3,4,5,6,7,8,9,10];

print_r($mass3);
$str2 = implode('-!-', $mass3);
print_r($str2);




