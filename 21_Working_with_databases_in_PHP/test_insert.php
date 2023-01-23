<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

$connection = new PDO("mysql:host=localhost;dbname=example;charset=utf8",'root','prestigio1987');
//$connection->exec("INSERT INTO user(first_name, last_name, email) values('Grisha', 'Petrov', 'grisha@mail.ru')");
//$statement = $connection->prepare("INSERT INTO user(first_name, last_name, email) values(:first_name, :last_name, :email)");

$insertOrderStatement = $connection->prepare("INSERT INTO `orders`(`id`, `user_id`, `order_details`, `order_date`) VALUES(null, :userid, :details, :date)");
$updateUser = $connection->prepare("UPDATE user SET orders_number = :orderNumber WHERE id = :id");
$getUserOrderNumber = $connection->prepare("SELECT orders_number FROM user WHERE id = :id");

$userId = 2;

$getUserOrderNumber->execute(['id' => $userId]);
$ordersNumber = $getUserOrderNumber->fetchColumn(0);

$connection->beginTransaction();
try{
    $insertOrderStatement->execute(['userid' => $userId, 'details' => 'BOOK', 'date' => (new \DateTime())->format('Y-m-d H:i:s')]);
    $updateUser->execute(['id' => $userId, 'orders_number' => $ordersNumber]);
    $connection->commit();
} catch (\Exception $e){
    echo 'RollBack';
    $connection->rollBack();
}
echo $connection->lastInsertId();

//while($i < 10){
//    $statement->bindValue('age', $i);
//    $statement->bindValue('id', $i);
//    $i++;
//    $statement->execute();
//}



//for($i = 5; $i < 10; $i++){
//    $statement->execute(['first_name' => "Sergey_{$i}", 'last_name' => "LN_{$i}", 'email' => "mail@_{$i}"]);
//}


//$statementUpdate = $connection->prepare("UPDATE user SET email = :email WHERE id = :id");
//$statementUpdate->execute(['id' => 4, 'email' => 'new_email@mail.ru']);