<?php
//Вы вложили 100 000 рублей на депозит в банк под 8% годовых. Вычислите, через сколько лет сумма на вашем депозите удвоится, при условии, что каждые три года банк будет увеличивать процентную ставку на 2%.
//
//Сохраните первоначальное значение суммы на депозите в переменную.
//Создайте ещё одну переменную, которая будет отражать текущее значение депозита.
//С помощью конструкций for, while или do...while организуйте цикл, в котором будут перебираться годы владения депозитом.
//Внутри цикла увеличивайте текущее значение депозита в соответствии с процентной ставкой, не забывайте при этом про саму ставку: она меняется каждые три года.
//Выполняйте цикл до тех пор, пока текущее значение депозита меньше первоначального ×2.
//Выведите результат на экран.

$summ = 100000;
$summ_for_procent = 100000;
$summ_itog = $summ * 2;
$current_summ = $summ;
$percent = 8;

$year = 0;
do{
    if($year != 0){
        if(($year % 3) == 0){
            $percent += 2;
        }
    }
    $year++;
    $number_percent = $summ_for_procent / 100 * $percent;
    $summ = $summ + $number_percent;
}
while($summ < $summ_itog);

echo "Процентная ставка на завершающий {$year} год была - ".$percent." процентов\n";
echo "Обшая сумма накопления равна ".$summ."\n";
echo "За завершающий год прибавилось - ".$number_percent."\n";
echo "Прошло лет - ".$year."\n";

//8% = 8000
//8% = 8000
//8% = 8000
//
//10% = 10000
//10% = 10000
//10% = 10000
//
//12% = 12000
//12% = 12000
//12% = 12000
//
//14% = 14000