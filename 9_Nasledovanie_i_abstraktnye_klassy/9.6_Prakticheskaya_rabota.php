<?php
class TelegraphText
{
    public $text, $title, $author, $published, $slug;
    public function __construct(string $author, string $slug)
    {
        $this->author = $author;
        $this->slug = $slug;
        $this->published = date("h-i-s");
    }
    public function storeText() : string
    {
        $data = [];
        $data['text'] = $this->text;
        $data['title'] = $this->title;
        $data['author'] = $this->author;
        $data['published'] = $this->published;
        // Сериализуем массив с помощью встроенной функции serialize и записываем его в файл. Имя файла хранится в поле $slug.
        //file_put_contents($this->slug, serialize($data));
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

abstract class Storage{
    abstract function create ($obj);
    abstract function read ($id);
    abstract function update ($id, $slug, $obj);
    abstract function delete ($id);
    abstract function list ($arrObj);
}

abstract class View{
    public $storage;
    function __construct($obj){
        $storage = $obj;
    }
    abstract function displayTextById($id);
    abstract function displayTextByUrl($url);
}

abstract class User {
    public $id;
    public $name;
    public $role;
    abstract function getTextsToEdit();
}

class FileStorage extends Storage {
    // сохраняет сериализованный объект класса TelegraphText
    public function create ($obj){
        $slug = 'test_text_file_' . date("Y_m_d") . '.txt';
        $data = $obj;
        if (file_exists($slug)){
            $i = 1;
            do {
                $slug = 'test_text_file_' . date("Y_m_d") . '_' . $i++ . '.txt';
            }
            while (file_exists($slug));
            file_put_contents($slug, serialize($data));
        }
        else{
            file_put_contents($slug, serialize($data));
        }

    }
    public function read ($id){
    }
    public function update ($id, $slug, $obj){
    }
    public function delete ($id){
    }
    public function list ($arrObj){
    }
}




// Создаём объект класса TelegraphText, передав необходимые для конструктора параметры
$objTelegraphText = new TelegraphText('Sergey', 'test_text_file.txt');
// Задаем значение свойств у экземпляра класса $objTelegraphText
$objTelegraphText->text = "Текст";
$objTelegraphText->title = "Заголовок";
// Вызываем метод storeText
//print_r($objTelegraphText->storeText());

$objFileStorage = new FileStorage();
$objFileStorage->create($objTelegraphText->storeText());