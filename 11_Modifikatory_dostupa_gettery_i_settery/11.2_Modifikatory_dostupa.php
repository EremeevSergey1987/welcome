<?php

class TestPerant {
    protected function testMethod()
    {
        echo 'It work!';
    }

    public function showMessage(){
        $this->testMethod();
    }
}

class TestInheritans extends TestPerant {
    public function TestPublic (){
        $this->showMessage();
    }
}

$testParentObj = new TestPerant();
$testInheritanseObj = new TestInheritans();

$testParentObj->showMessage();

//$testInheritanseObj->TestPublic();
//$testParentObj->testMethod();
