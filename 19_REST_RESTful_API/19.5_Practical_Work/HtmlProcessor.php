<?php
//Создайте файл HtmlProcessor.php. В этом файле будет имплементирована обработка запроса методом POST в формате JSON.
//Чтобы определить метод запроса в HtmlProcessor.php, используйте значение  $_SERVER['REQUEST_METHOD']. Для получения тела запроса — в нём будет передаваться текст,
// помещенный в объект JSON, — используйте $_POST или file_get_contents('php://input').
//Получив текст, выполните замену всех тегов со ссылками на текст самих ссылок.
//Когда преобразование будет выполнено, создайте JSON объект с полем formatted_text, присвойте ему преобразованный текст и отправьте в ответе.
//В случае, если на входе вы получили пустой текст, отправьте пустой ответ с кодом 500. Код ответа можно указать с помощью функции http_response_code.
//В заголовке ответа также укажите Content-Type: application/json.

header('Content-Type: application/json; charset=utf-8');
if(empty($_POST)){
    http_response_code(500);
    echo http_response_code();
}
else{
    //echo 'Метод запроса в HtmlProcessor.php - '. $_SERVER['REQUEST_METHOD'] . PHP_EOL;
    $jsonContent = file_get_contents('php://input');
    $arrayContent = json_decode($jsonContent, true);
    $replacedContent = preg_replace("/\<a.*href=\"(.*)\".*\>(.*)\<\/a\>/Usi",'$2',$arrayContent['raw_text']);
    $array_replaced_to_json = array('formatted_text' => $replacedContent); // Создаем массив для преобразования его в JSON
    echo json_encode($array_replaced_to_json); // Преобразовываем массив в JSON
}
