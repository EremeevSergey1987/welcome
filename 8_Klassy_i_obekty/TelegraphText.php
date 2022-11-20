<?php

class TelegraphText
{
    public $text, $title, $author, $published, $slug;
    public function __construct(string $author, string $slug)
    {
        $this->author = $author;
        $this->slug = $slug;
        $this->published = date("F j, Y, g:i a");
    }
    public function storeText()
        {
            $textTitleAuthrArray = [];
            $textTitleAuthrArray['text'] = $this->text;
            $textTitleAuthrArray['title'] = $this->title;
            $textTitleAuthrArray['author'] = $this->author;
            $textTitleAuthrArray['published'] = $this->published;
            file_put_contents($this->slug, serialize($textTitleAuthrArray));
            return serialize($textTitleAuthrArray);
        }
    public function loadText(){
        if(file_get_contents($this->slug))
        {
            $arr = unserialize(file_get_contents($this->slug));
            return $arr['text'];
        }
        else{
            return 'Файл пуст';
        }
    }

}

$test = new TelegraphText('Sergey', 'test_text_file.txt');
$test->text = "Большой текст";
$test->title = "Заголовок";

//echo $test->author . PHP_EOL;
//echo $test->published . PHP_EOL;
//echo $test->slug . PHP_EOL;
//
//
//echo $test->storeText();
//
//print_r(unserialize($test->storeText()));
echo $test->loadText();