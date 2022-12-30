<?php
class Manager implements Serializable {
    private $sales = [];
    private $department = 'Отдел продаж';
    private $name = 'Василий';

    public function addSale($goodName)
    {
        $this->sales[] = $goodName;

    }
    public function serialize()
    {
        return serialize($this->sales);
    }
    public function unserialize($data)
    {
        $this->sales = unserialize($data);
    }
}

$manager = new Manager();
$manager->addSale('Sony');
$manager->addSale('HP');
$manager->addSale('Apple');

echo serialize($manager);