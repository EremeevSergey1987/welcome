<?php
$list = [
    'a' => 'word a',
    'b' => 'word b',
    'c' => 'word c',
];
//Как вывести именно одни ключи или значения?
$list1 = array_keys($list);
$list2 = array_values($list);
//var_dump($list2);

$list3 = [
    'a' => 'word a',
    'b' => 'word b',
];

$list4 = [
    'c' => 'word c',
    'd' => 'word d',
    'a' => 'word a2',
];

$list5 = array_merge($list3, $list4);
//var_dump($list5);

$list6 = ['a', 'b', 'c'];
$list7 = ['d', 'e', 'a'];
$list8 = array_merge($list6, $list7);
//var_dump($list8);

$list9 = [
    'a' => 'word a',
    'word b',
];
$list10 = [
    'c' => 'word c',
    'a' => 'word a1',
    'word b',
];
$list11 = array_merge($list9, $list10);
//print_r($list11);

$keys = ['a', 'b'];
$value = ['word a', 'word b'];
$list12 = array_combine($keys, $value);
//print_r($keys);
//print_r($value);
//print_r($list12);


$list13 = [
    'a' => 'word a',
    'b' => 'word b',
    'c' => 'word a',
];
$list14 = array_flip($list13);
//print_r($list14);

$list15 = ['a','b','c','d',];
$list16 = array_reverse($list15);
//print_r($list16);

$list17 = [
    'a' => 'word a',
    'b' => 'word b',
    'c' => 'word c',
];
$list18 = array_reverse($list17);
//print_r($list18);

$list19 = ['a','b','c','d',];
$list20 = array_reverse($list19);
//print_r($list20);

$list21 = array_reverse($list19, true);
//print_r($list21);

$list22 = ['a','b','c','d',];
$hasLetter = in_array('b', $list22);
$hasLetter2 =  array_search('f', $list22);
//var_dump($hasLetter2);

$list23 = [
    'a' => 'word a',
    'dd' => 'word b',
    'c' => 'word c',
];

$indexWord = array_search('word b', $list23);
var_dump($indexWord);




