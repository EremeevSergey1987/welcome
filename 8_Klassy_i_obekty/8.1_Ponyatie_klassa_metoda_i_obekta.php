<?php
class employee
{
    public $age, $gender, $name, $surname, $position;

    public function displayName()
    {
        echo $this->name . PHP_EOL;
    }

    public function displayAge()
    {
        echo $this->age . PHP_EOL;
    }

    public function chargePosition($newEmployee)
    {
        $this->position = $newEmployee;
    }
}

$employee_1 = new employee();
$employee_2 = new employee();

$employee_1->age = 30;
$employee_1->position = 'CEO';
$employee_1->name = 'Nick';
$employee_1->surname = 'Ivanov';

$employee_2->age = 33;
$employee_2->position = 'Buh';
$employee_2->name = 'Kate';
$employee_2->surname = 'Ost';
$employee_2->gender = 'male';

$employee_1->displayName();
$employee_2->displayName();
$employee_2->chargePosition("CEO");

print_r($employee_2);