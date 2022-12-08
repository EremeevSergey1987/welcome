<?php
class Ticker {
    private $author;

    public function __set($name, $value)
    {
        if($name == 'author'){
            if(strlen($value) > 120 )
            {
                echo 'Поле $author слишком длинное! Оно больше 120 символов и имеет длину - ' . strlen($value);
                return;
            }
            $this->author = $value;

        }
    }
    public function __get($name)
    {
        if($name == 'author'){
            echo 'rty' . PHP_EOL;
            return strtoupper($this->author);
        }
    }
}

$obj = new Ticker();
//$obj->author = 'Sergey Sergey Sergey Sergey Sergey Sergey Sergey Sergey Sergey Sergey Sergey Sergey Sergey Sergey Sergey Sergey Sergey Sergey Sergey Sergey Sergey Sergey Sergey ';
$obj->author = 'Sergey';

echo $obj->author;

