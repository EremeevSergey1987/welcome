<?php

interface StringWriter {
    public function writeString($str);
}

class FileWriter implements StringWriter {
    public function writeString($str)
    {
        file_put_contents('./example.txt', $str);
    }
}

class ScreenWriter implements StringWriter {
    public function writeString($str)
    {
        echo $str . PHP_EOL;
    }
}

class Plus implements StringWriter {
    public function writeString($str)
    {
        echo 4+4;
    }
}

class StringProcessor {
    private $writer, $str;
    public function __construct(StringWriter $writer, $str){
        $this->writer = $writer;
        $this->str = $str;
    }
    public function write(){
        $this->writer->writeString($this->str);
    }
}

$fileWriter = new FileWriter();
$screenWriter = new ScreenWriter();
$objPlus = new Plus();
$testString = 'Hello, World!';

var_dump($fileWriter);
var_dump($screenWriter);
var_dump($objPlus);

$stringFileProcessor = new StringProcessor($fileWriter, $testString);
$stringScreenProcessor = new StringProcessor($screenWriter, $testString);
$plus = new StringProcessor($objPlus, $testString);

$stringFileProcessor->write();
$stringScreenProcessor->write();
$plus->write();
