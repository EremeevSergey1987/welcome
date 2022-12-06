<?php
class Ticker {
    private $string;
    public function setString($value)
    {
        if(stripos($value, '<script>') !== false){
            echo 'Строка содержит иньекцию кода' . PHP_EOL;
            return;
        }
        $this->string = $value;

    }
    public function getString()
    {
        return strtoupper($this->string);
    }


    public function __set ($name, $value)
    {
        if($name == 'string'){
            $this->setString($value);
        }
    }
    public function __get ($name)
    {
        if($name == 'string'){
            return $this->getString();
        }
    }
}

$ticker = new Ticker();
//$ticker->setString('Mary Had A Little Lamb and She LOVED It So');
$ticker->string = 'Строка';
echo $ticker->string . PHP_EOL;