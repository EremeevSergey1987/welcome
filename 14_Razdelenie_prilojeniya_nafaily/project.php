<?php
require_once 'vendor/autoload.php';
$matrix = Matrix\Builder::createFilledMatrix(1, 5, 5);
print_r($matrix);
