<?php

//while(false){
//    echo "Я цикл while";
//}
//
//do{
//    echo "Я цикл do_while";
//}
//while(false);

//Если в вашем алгоритме нужно выполнять действие хотябы 1 раз - то нужно пользоваться циклом do ... while

stream_set_blocking(STDIN, false);
do{
    echo rand(10000,99999);
    $key = ord(fgetc(STDIN));
}
while($key != 10);