<?php

class Manager implements ArrayAccess
{
    private $sales = [];
    private $department = 'Отдел продаж';
    private $name = 'Василий';

    public function addSale($goodName)
    {
        $this->sales[] = $goodName;

    }

    public function offsetGet($offset)
    {
        if(isset($this->sales[$offset])){
            return $this->sales[$offset];
        }
        return null;
    }

    public function offsetSet($offset, $value)
    {
        $this->sales[$offset] = $value;
    }

    public function offsetExists($offset)
    {
        return isset($this->sales[$offset]);
    }
    public function offsetUnset($offset)
    {
        unset($this->sales[$offset]);
    }
}

$manager = new Manager();
$manager->addSale('Sony');
$manager->addSale('HP');
$manager->addSale('Apple');
$manager[3] = 'Lenovo';

echo $manager[3];