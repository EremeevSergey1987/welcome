<?php
//Задание 2
//Напишите генератор автомобильных номеров для серии для одного региона Российской Федерации. Ограничим буквы в возможных комбинациях А и B. Так, формат автомобильного номера имеет следующий вид: X000XX, где X — это серия, тут может быть указана любая буква, имеющая аналог в кириллическом и латинском алфавите, а 000 — номер, он может принимать любые значения от 000 до 999. В нашем случае серия ограничена комбинациями A и B.
//С помощью конструкции for, foreach или while организуйте сначала цикл, который будет осуществлять перебор символов A и B (для генерации серии).
//Внутри него — вложенный цикл, который будет осуществлять перебор номеров от 000 до 999.
//Внутри цикла, который осуществляет перебор номеров, организуйте вывод на экран серии и номера в формате X000XX, каждый номер — с новой строки.
//Добавьте массив, который будет содержать сгенерированные номера и, вместо вывода номеров на экран (внутри цикла, где вы осуществляете перебор номеров от 000 до 999), сохраните номера в этот массив.
//С помощью отдельного цикла foreach выведите все номера на экран.
//С помощью отдельного цикла foreach удалите из массива номера, которые не содержат одинаковые цифры (то есть у вас должны остаться только номера вида 000, 111, 222, 333 и так далее).
//Выведите получившийся массив на экран (после вывода всех номеров).

$arr = ['A', 'B'];
foreach ($arr as $item1){
    foreach ($arr as $item2){
        foreach ($arr as $item3){
            for($i = 0; $i <= 999; $i++){
                $arr2[] = $item1.str_pad($i, 3, '0', STR_PAD_LEFT).$item2.$item3;
            }
        }
    }
}
foreach ($arr2 as $item){
    if(($item[1] == $item[2]) && ($item[2] == $item[3])){
        $arr3[] = $item;
    }
}
print_r($arr3);