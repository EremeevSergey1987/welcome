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

$screenWriter = new ScreenWriter();
$fileWriter = new FileWriter();

$testString = 'Hello, World!';

var_dump($fileWriter);
var_dump($screenWriter);
//var_dump($objPlus);


$stringScreenProcessor = new StringProcessor($screenWriter, $testString);
$stringScreenProcessor->write();

$stringFileProcessor = new StringProcessor($fileWriter, $testString);
$stringFileProcessor->write();



