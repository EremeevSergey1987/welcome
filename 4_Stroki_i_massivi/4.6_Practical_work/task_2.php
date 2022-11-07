<?php
//Дана строка с повторными словами:
//«Я люблю море. Я лечу на море. Я умею плавать в море. Какое чистое море! Хочу на море. Завтра поедем на море.»
//Присвойте указанную фразу в виде значения переменной.
//Найдите в ней повторяющееся слово и присвойте его в виде строки в другую переменную.
//Замените повторные слова в указанной фразе на те же самые (с помощью функции для замены подстрок в строках), перевёрнутые в обратном порядке с помощью функции strrev.
//Подсказка: для переворачивания строки можно использовать встроенную функцию strrev.
//Подсказка 2: результатом переворота слова скорее всего будет нечитаемый набор символов, потому что функция strrev не работает с мультибайтовыми кодировками. Пока на это можно не обращать внимание.
//Условие: в функции замены подстрок нужно использовать созданные переменные.

$str = "Я люблю море. Я лечу на море. Я умею плавать в море. Какое чистое море! Хочу на море. Завтра поедем на море.";
$str_clean = str_replace(['.', '!','.'], '', $str);
$arr = explode(' ', $str_clean);
$count_values = array_count_values($arr);
arsort($count_values);
$flip_values = array_flip($count_values);
$max_count_word = array_shift($flip_values);

echo "Самое повторяющееся слово в данной строке это слово - '{$max_count_word}'\n";
$str_edit = str_replace($max_count_word, strrev($max_count_word), $str);
echo $str_edit;