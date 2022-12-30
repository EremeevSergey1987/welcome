<?php
 class Test{
     public static $publicField = 20;
     private static $privedField = 30;
     protected static $protectedField = 40;
 }

 class inherit extends Test{
     public function showPrivedField()
     {
         echo self::$privedField . PHP_EOL;
     }

     public function showProtectedField()
     {
         echo self::$protectedField . PHP_EOL;
     }
 }

 $obj = new inherit();
 echo $obj::$publicField . PHP_EOL;
 //$obj->showPrivedField() . PHP_EOL;
 $obj->showProtectedField();
