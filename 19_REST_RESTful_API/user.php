<?php
class User {
    public $email, $nickName, $name, $age, $id;
    public function __construct($email, $nickName, $name, $age)
    {
        $this->email = $email;
        $this->name = $name;
        $this->age = $age;
        $this->nickName = $nickName;
        $this->id = rand(1, 100);
    }
}

class Storage {
    const FILE_PATH = './users.json';
    public $objetsList = [];
    public function store(){
        $json = json_encode($this->objetsList);
        file_put_contents(self::FILE_PATH, $json);
    }

    public function __construct(){
        $this->read();
    }

    public function read(){
        if(file_exists(self::FILE_PATH))
        {
            $this->objetsList = (array)json_decode(file_get_contents(self::FILE_PATH), true);
        }
    }
}

class UserStorage extends Storage {
    public function addUser(){
        $user = new User($_POST['email'], $_POST['nickName'], $_POST['name'], $_POST['age']);
        $this->objetsList[] = $user;
        $this->store();
    }
    public function dellUser($id){
        foreach ($this->objetsList as $key => $user){
            if($user->id === intval($id)){
                unset($this->objetsList[$key]);
                $this->store();
                break;
            }
        }
    }
    public function updateUser($id){
        parse_str(file_get_contents('php://input'), $PUT);
        foreach ($this->objetsList as $key => $user){
            if($user->id === intval($id)){
                $this->objetsList->$key->name = isset($PUT['name']) ? $PUT['name'] : $this->objetsList->$key->name;
                $this->objetsList->$key->nickName = isset($PUT['nickName']) ? $PUT['nickName'] : $this->objetsList->$key->nickName;
                $this->objetsList->$key->email = isset($PUT['email']) ? $PUT['email'] : $this->objetsList->$key->email;
                $this->objetsList->$key->age = isset($PUT['age']) ? $PUT['age'] : $this->objetsList->$key->age;
                $this->store();
                break;
            }
        }
    }
    public function getUser($id){
        foreach ($this->objetsList as $key => $user){
            if($user->id === intval($id)){
                echo json_encode($user);
            }
        }
        return null;
    }
    public function getUsers(){
        return json_encode($this->objetsList);
    }
}

$userStorage = new UserStorage();

// C - POST /user.php
// R - GET /user.php?id=1
// U - PUT /user.php
// D - DELETE /user.php?id=1
// R - GET /user.php

switch ($_SERVER['REQUEST_METHOD']){
    case 'POST' : $userStorage->addUser();
    break;

    case 'GET' :
        if(isset($_GET['id'])) {
            $userStorage->getUser($_GET['id']);
        }
        else{
            $userStorage->getUsers();
        }

    break;

    case 'PUT' : $userStorage->updateUser($_GET['id']);
    break;

    case 'DELETE' : $userStorage->dellUser($_GET['id']);
    break;
}
















