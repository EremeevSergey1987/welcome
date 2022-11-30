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
    public function storeText() : string
        {
            $data = [];
            $data['text'] = $this->text;
            $data['title'] = $this->title;
            $data['author'] = $this->author;
            $data['published'] = $this->published;
            // Сериализуем массив с помощью встроенной функции serialize и записываем его в файл. Имя файла хранится в поле $slug.
            file_put_contents($this->slug, serialize($data));
            return serialize($data);
        }
    public function loadText() : array | string
    {
        if(file_get_contents($this->slug)) {
            $arr = unserialize(file_get_contents($this->slug));
            return $arr['text'] . PHP_EOL;
        } else {
            return 'Файл пуст';
        }
    }
    public function editText(string $title, string $text) : array
    {
        $this->title = $title;
        $this->text = $text;
        return unserialize(self::storeText());
    }
}

// Создаём объект класса TelegraphText, передав необходимые для конструктора параметры
$objTelegraphText = new TelegraphText('Sergey', 'test_text_file.txt', );

// Задаем значение свойств у экземпляра класса $objTelegraphText
$objTelegraphText->text = "Текст";
$objTelegraphText->title = "Заголовок";

// Вызываем метод storeText
print_r(unserialize($objTelegraphText->storeText()));

// Вызов метода loadText
var_dump($objTelegraphText->loadText());

// Вызываем метод editText
print_r($objTelegraphText->editText('New2 title', 'New text'));
