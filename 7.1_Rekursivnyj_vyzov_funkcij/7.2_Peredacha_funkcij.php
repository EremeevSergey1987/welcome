<?php
$simpleNomber = 7;
//Это callBack функция
function cbOne( $name ){
    return "My mame is " . $name;
}
//Это тоже callBack функция
//function cbTwo(){
//    return "My name id cbTwo";
//}
function runCallBack( $fname ){
    if(is_callable($fname)){
        //Вот эта функция (call_user_func) вызывает поступившие строки которые явяляются именами вышестоящих функций
        echo call_user_func('cbOne', $fname) . PHP_EOL;
    }

}
//runCallBack('cbOne');
//runCallBack('simpleNomber');

$numbers = [1,2,3,4,5,];
//function factorial ( $n ){
//    return $n> 1 ? $n * factorial($n-1 ) : $n;
//}

$newNumbers = array_map('sqrt', $numbers);

echo "Результат - " . PHP_EOL;
print_r( $newNumbers );
echo "Исходный массив - " . PHP_EOL;
print_r($numbers);
