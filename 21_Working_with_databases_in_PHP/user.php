<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

$connection = new PDO("mysql:host=localhost;dbname=example;charset=utf8",'root','prestigio1987');
$statement = $connection->query('SELECT * FROM user');
$statement->execute();

//while($result = $statement->fetch()){
//    print_r($result);
//}

//$res_fetchAll = $statement->fetchAll();

while ($res_fetchColumn = $statement->fetchColumn(3)){
    echo $res_fetchColumn . PHP_EOL;
}



