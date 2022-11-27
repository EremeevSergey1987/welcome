<?php
class TelegraphText
{
    public $text, $title, $author, $published, $slug, $objFileStorage;
    public function __construct(string $author, string $slug, $objFileStorage)
    {
        $this->author = $author;
        $this->slug = $slug;
        $this->published = date("h-i-s");
        $this->objFileStorage = $objFileStorage;
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
    public function loadText()
    {
        $this->objFileStorage->read($this->slug);
    }

    public function editText(string $title, string $text) : array
    {
        $this->title = $title;
        $this->text = $text;
        return unserialize(self::storeText());
    }
}

abstract class Storage {
    abstract function create ($objTelegraphText);
    abstract function read ($slugSearch);
    abstract function update ($slugUpdete, $titleUpdete, $objTelegraphText);
    abstract function delete ($slugDelete);
    abstract function list ();
}

abstract class View {
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

    public function create ($objTelegraphText)
    {
        $slug = 'test_text_file_' . date("Y_m_d") . '.txt';
        $i = 1;
        while (file_exists($slug)) {
            $slug = 'test_text_file_' . date("Y_m_d") . '_' . $i++ . '.txt';
        }
        $objTelegraphText->slug = $slug;
        file_put_contents($slug, serialize($objTelegraphText));
        return $objTelegraphText->slug;
    }

    public function read ($slugSearch)
    {
        if (file_exists($slugSearch)) {
            if (file_get_contents($slugSearch)) {
                return unserialize(file_get_contents($slugSearch));
            } else {
                return 'Файл пуст';
            }
        } else {
            echo 'Файл не найден';
        }
    }

    public function update ($slugUpdete, $titleUpdete, $objTelegraphTextUpdete) {
        $objTelegraphTextUpdete->title = $titleUpdete;
        file_put_contents($slugUpdete, serialize($objTelegraphTextUpdete));
    }

    public function delete ($slugDelete) {
        unlink($slugDelete);
    }

    public function list ()
    {
        $dir = scandir(__DIR__);
        $arr_search = [];
        foreach ($dir as $v){
            $expansion = substr($v, -4);
            if($expansion == '.txt'){
                $arr_search[] = $v;
                $obj = unserialize(file_get_contents($v));
                echo $obj->text . PHP_EOL;
            }
        }
    }
}

$objFileStorage = new FileStorage();
$objTelegraphText = new TelegraphText('Sergey', 'test_text_file_2022_11_26_28.txt', $objFileStorage);
$objTelegraphText->title = "Заголовок465";
$objTelegraphText->text = "Текст, текст, текст";


$slugReturn = $objFileStorage->create($objTelegraphText);

$slugRead = 'test_text_file_2022_11_26_12.txt';
//print_r($objFileStorage->read($slugRead));

// Вызов метода loadText
var_dump($objTelegraphText->loadText());

$slugUpdete = 'test_text_file_2022_11_26_1.txt';
$titleUpdete = 'Заголовок!';
$objTelegraphTextUpdete = unserialize(file_get_contents($slugUpdete));
$objFileStorage->update($slugUpdete, $titleUpdete, $objTelegraphTextUpdete);

$slugDelete = 'test_text_file_2022_11_26_3.txt';
//$objFileStorage->delete($slugDelete);

//$objFileStorage->list();
