<?php
$str = 'Приывет, мир!';
$str2 = 'Хочу скачат \'Привет, Мир!\' ';
//echo $str;
//echo $str2;

$str3 = 'Символ \ называется "Обратный слэш" ';
//echo $str3;

$str4 = 'Привет, Мир!\r \ эта чать уже на новой строке? \t - нет';
//echo $str4;

$str5 = "Привет, \"мир!\" \n";
//echo $str5;

$str6 = "Как дела? \t - хорошо!";
//echo $str6;

$a = 25;
$str7 = "Мне $a лет";
//echo $str7;

$var_heredoc = <<<EOD
Привет, мир!\n
Как дела? "Хорошо!"
строка использует here\doc синтаксис 
EOD;
//echo $var_heredoc;

$var_concat1 = "Hello";
$var_concat2 = ' world!';
$concat = $var_concat1 . $var_concat2;
//echo $concat;

$str8 = 'Привет';
//echo $str8 .= $var_concat2;

$str9 = "Hello";
//var_dump($str9);

$str10 = "Привет";
//var_dump($str10);

$length = strlen($str10);
//var_dump($length);


$length_mb = mb_strlen($str10);
//var_dump($length_mb);

$str11 = 'hello';
$e = $str11[1];
//echo $e;

//echo strlen($str11);
$letter = $str11[strlen($str11)-1];
//echo $letter;

$str11[1] = 'E';
echo $str11;