<?php
include 'module1.php';
include 'module2.php';

use LibraryTwo\TestToolkit as TK;

$testObj = new TK\testClass();
$testObj->LibraryName();

$testOdjTwo = new LibraryOne\testClass();
$testOdjTwo->LibraryName();