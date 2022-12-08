<?php

class manager implements Iterator
{
    public $sales = [];
    public $position = 0;
    public function addSale($goodName){
        $this->sales[] = $goodName;

    }
    public function current()
    {
        return $this->sales[$this->position];
    }

    public function key()
    {
        return $this->position;
    }
    public function rewind()
    {
        $this->position = 0;
    }
    public function next()
    {
        ++$this->position;
    }
    public function valid()
    {
        return isset($this->sales[$this->position]);
    }

}

$manager = new manager();
$manager->addSale('Nout');
$manager->addSale('Vel');
$manager->addSale('HP');

var_dump($manager);

foreach ($manager as $value){
    echo $value . PHP_EOL;
}