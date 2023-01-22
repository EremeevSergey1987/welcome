<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

$connection = new PDO("mysql:host=localhost;dbname=example;charset=utf8",'root','prestigio1987');

//$stmt = $connection->prepare('SELECT * FROM user WHERE id = ? OR email LIKE ?');
//$stmt->execute([1, 'ivan@mail.ru']);

//$stmt = $connection->prepare('SELECT * FROM user WHERE id = :id OR email LIKE :email');
//$stmt->execute(['id' => 1, 'email' => 'ivan@mail.ru']);

$stmt = $connection->prepare('SELECT * FROM user WHERE id = :id OR email LIKE :email');


$id = 1;
$email = 'ivan@mail.ru';
//$stmt->bindValue('id', $id);
//$stmt->bindValue('email', $email);

$stmt->bindParam('id', $id);
$stmt->bindParam('email', $email);

$id = 2;

$stmt->execute();


$result = $stmt->fetchAll();
print_r($result);