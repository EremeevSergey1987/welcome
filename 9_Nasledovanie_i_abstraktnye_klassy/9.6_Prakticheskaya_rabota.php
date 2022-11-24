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
    public function create ($obj){

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
