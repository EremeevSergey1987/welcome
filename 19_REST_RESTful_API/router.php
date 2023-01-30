<?php
switch ($_GET['route']){
    case '/book' :
       include_once './BooksController.php';
       $controller = new BooksController();
       echo $controller->list();
       break;

    case '/user' :
        include_once './UserController.php';
        $controller = new UserController();
        echo $controller->list();
        break;

    default:
        http_response_code(403);
}