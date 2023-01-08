<?php
echo 'Метод запроса в HtmlProcessor.php - '. $_SERVER['REQUEST_METHOD'] . PHP_EOL;
var_dump(file_get_contents('php://input'));
var_dump($_POST);

if(empty($_POST)){
    http_response_code(500);
    header('Content-Type: application/json; charset=utf-8');
    echo http_response_code();
}
else{

}