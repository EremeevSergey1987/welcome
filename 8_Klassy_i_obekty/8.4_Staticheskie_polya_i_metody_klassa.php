<?php
class Student {
    public static $department = 'Иностранных языков';
    public $name;
    public function __CONSTRUCT($name)
    {
        $this->name = $name;
    }
    public function showDepartment()
    {
        echo self::$department . PHP_EOL;
    }
    public static function changeDepartment($department){
        self::$department = $department;
    }
}

$student_1 = new Student('Vasia');
Student::changeDepartment('Факультет туризма');
//$student_1->changeDepartment('Новый факультет');
echo $student_1->name . PHP_EOL;

$student_2 = new Student('Petr');
echo $student_2->name . PHP_EOL;
$student_2->showDepartment();