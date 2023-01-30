<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

try{
 $connection = new PDO("mysql:host=localhost;dbname=example;charset=utf8",'root','prestigio1987');
} catch (\PDOException $e){
    echo $e->getMessage();
    //header('location: https://ya.ru');
};

$statement = $connection->prepare('SELECT * FROM user');
$queryResult = $statement->execute();
$dataResult = $statement->fetchAll();
print_r($dataResult);

//phpinfo();