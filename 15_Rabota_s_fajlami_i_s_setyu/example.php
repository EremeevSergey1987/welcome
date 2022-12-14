<?php

//$fp = fopen('license.txt', 'r');
//echo filesize('license.txt');
//$content = fread($fp, filesize('license.txt'));
//while (! feof($fp)){
//    $symbol = fread($fp, 1);
//    echo $symbol;
//}
//echo $content . PHP_EOL;

echo file_get_contents('license.txt');

