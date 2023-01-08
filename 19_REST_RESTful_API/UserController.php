<?php

class UserController{
    protected $userList = ['Ivan', 'Sergey', 'Timafey'];
    public function list(){
        return json_encode($this->userList);
    }
}