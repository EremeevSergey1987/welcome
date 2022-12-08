<?php
$str = 'Hello world';

$word1 = substr($str, 0, 5);
//echo $word1;

$part = substr($str, 4);
//echo $part;

$part2 = substr($str, -5);
//echo $part2;

$part3 = substr($str,6, -4);
//echo $part3;

$str2 = 'Hello world';
$index = strpos($str2, 'e');
//var_dump($index);

$str3 = 'abc abc';
$index2 = strpos($str3, 'abc', 2);
//var_dump($index2);

$str4 = 'abc abc';
$index4 = strpos($str4, 'ecd');
//var_dump($index4);

$str5 = 'abc abc';
$index5 = strpos($str5, 'aBC');
//var_dump($index5);

$str6 = 'abc abc';
$index6 = stripos($str6, 'aBC');
//var_dump($index6);

$str7 = 'Hello world';
$str8 = str_replace('Hello', 'Hi', $str7);
//echo $str8;

$str8 = 'Hello world';
$str9 = str_ireplace('HellO', 'Hi', $str8);
//echo $str9;

$str10 = 'abc abc';
$str11 = str_replace('abc', 123, $str10, $count);
//echo $str11;
//var_dump($count);

$str12 = 'Hello, World';
$str13 = strtolower($str12);
//echo $str13;

$str14 = 'Hello, World';
$str15 = strtoupper($str14);
//echo $str15;

$str16 = '   Hello   ';
$str17 = trim($str16);
//echo $str17;

$str18 = 'hellow   ';
$str19 = rtrim($str18);
//echo $str19;

$str20 = "\n\n hellow";
$str21 = ltrim($str20);
echo $str21;







