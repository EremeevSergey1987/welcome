<?php
require 'module1.php';
require 'module2.php';

echo 'Квадрат числа равен ' . sqr(2) . PHP_EOL;
echo 'Наши вычисления ' . calca(2) . PHP_EOL;

require_once 'module2.php';

echo 'still working' . PHP_EOL;