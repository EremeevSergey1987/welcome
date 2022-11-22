<?php
class A{
    public $message;
}

class B extends A{
    public function __CONSTRUCT(){
        $this->message = 'Hellow World';
    }
    public function showMessage()
    {
        echo $this->message;
    }
}

$object = new B();
$object->showMessage();