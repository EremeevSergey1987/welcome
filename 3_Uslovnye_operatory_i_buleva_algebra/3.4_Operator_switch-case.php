<?php
$a = 3;
//switch ($a) {
//    case 1:
//        $b = 10;
//        break;
//    case 2:
//    case 3:
//        $b = 4;
//        break;
//    case 3:
//        $b = 5;
//        break;
//    default:
//        $b = -11;
//}
//var_dump($b);

$c = 4;
switch ($a + 1){
    case 3:
        $b = 0;
        break;
    case $c:
        $b = 1;
        break;
}
var_dump($b);