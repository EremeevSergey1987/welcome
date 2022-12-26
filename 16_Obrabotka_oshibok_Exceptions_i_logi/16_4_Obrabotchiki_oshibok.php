<?php

function errorHandler($level, $msg, $file, $line){
    if($level === E_WARNING){
        echo 'ERROR!!!';
        $time = new \DateTime();
        file_put_contents('admin2.log', $time->format('Y-m-d H:i:s') . ' ' . $msg . ' in line ' . $line . ' in file ' . $file . PHP_EOL, FILE_APPEND);
    }
}
set_error_handler('errorHandler');

//function errorHandler($level, $msg, $file, $line){
//    if($level === E_WARNING){
//        echo 'Что - то пошло не так';
//        $time = new \DateTime();
//        file_put_contents('admin.log', $time->format('Y-m-d H:i:s') . ' ' .  $msg . ' in line ' . $line . ' in file ' . $file . PHP_EOL, FILE_APPEND);
//    }
//}
//set_error_handler('errorHandler');

$a = [];
echo $a[5];