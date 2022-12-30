<?php
$a = false;
$b = false;
$c = true;

$d = $a || ! ($b && $c) ? 1 : 0;
var_dump($d);


