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
}

$ticker = new Ticker();
$ticker->setString('Mary Had A Little Lamb and She LOVED It So');
echo $ticker->getString();