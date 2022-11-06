<?php
//Задание 1
//Во время войны с галлами император Римской империи Юлий Цезарь использовал в своих письмах шифр, чтобы враги не смогли их прочитать. Шифр был достаточно простым и заключался в замене каждой буквы латинского алфавита на другую, стоящую на несколько позиций левее или правее в алфавите. Количество позиций в алфавите, на которое нужно отступить для замены буквы, — это сдвиг шифра.
//Например, если мы зададим сдвиг шифра равным +3, то букву A следует заменить на D, букву E на H и так далее. Если мы дошли до конца алфавита, то отсчёт начинается сначала. Так, при сдвиге +3 Y меняется на B. Для расшифровки нужно выполнить действия в обратном порядке.
//Задайте переменную, содержащую слово, которое нужно зашифровать. Пусть слово будет состоять только из латинских букв в нижнем регистре.
//Задайте переменную, содержащую значение сдвига шифра.
//С помощью цикла for или while обратитесь к каждой букве слова и замените её, добавив значение сдвига к её позиции. Подсказка: каждому символу соответствует числовой код. Он может принимать значение от 0 до 255. Чтобы узнать числовой код, воспользуйтесь функцией ord, а чтобы найти символ, соответствующий числовому коду, используйте функцию chr.
//Выведите зашифрованное слово на экран.
//С помощью цикла for или while расшифруйте слово.
//Выведите результат (расшифрованное слово) на экран.
//

$secret_word = "zzz";
$step = 3;

$ord = ord($secret_word[1]) + $step;
if($ord > 122){
    echo "Ord больше 122 оно равно ".$ord."\n";
}
else{
    echo "Ord меньше 122 оно равно ".$ord."\n";
}

echo ord('a');

$array = array(
    'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r',
    's', 't', 'u', 'v', 'w', 'x', 'y', 'z',
);

foreach ($array as $k => $v){
    $alf[ord($v)] = $v;
}
print_r($alf);

foreach ($alf as $k => $v){
    if($secret_word[0] == $v){
        $k = $k + $step;
    }
}
echo $k;


