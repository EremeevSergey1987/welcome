<?php
class Manager implements Iterator {
    private $sales = [];
    private $position = 0;
    public function addSale($goodName)
    {
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

$manager = new Manager();
$manager->addSale('Sony');
$manager->addSale('HP');
$manager->addSale('Apple');

foreach ($manager as $item){
    echo $item . PHP_EOL;
}
