<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

$connection = new PDO("mysql:host=localhost;dbname=example;charset=utf8",'root','prestigio1987');
$connection->exec('INSERT INTO user (id, first_name) values () ');