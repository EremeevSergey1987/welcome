<?php
class Manager implements Stringable {
    private $sales = [];
    private $department = 'Отдел продаж';
    private $name = 'Василий';

    public function addSale($goodName)
    {
        $this->sales[] = $goodName;

    }
    public function __toString()
    {
        return $this->name . ' из ' . $this->department . PHP_EOL;
    }
}

$manager = new Manager();
$manager->addSale('Sony');
$manager->addSale('HP');
$manager->addSale('Apple');

echo $manager;