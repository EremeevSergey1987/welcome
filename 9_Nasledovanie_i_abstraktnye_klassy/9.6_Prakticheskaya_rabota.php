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
    public function storeText(): string
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
    public function loadText($slug): string
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

abstract class Storage {
    abstract function create (&$objTelegraphText);
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

    public function create (&$objTelegraphText): string
    {
        print_r($objTelegraphText);
        $slug = 'test_text_file_' . date("Y_m_d") . '.txt';
        $i = 1;
        while (file_exists($slug)) {
            $slug = 'test_text_file_' . date("Y_m_d") . '_' . $i++ . '.txt';
        }
        $objTelegraphText->slug = $slug;
        file_put_contents($slug, serialize($objTelegraphText));
        print_r($objTelegraphText);
        return $objTelegraphText->slug;
    }

    public function read ($slugSearch): string
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

    public function update ($slugUpdete, $titleUpdete, $objTelegraphTextUpdete): void
    {
        $objTelegraphTextUpdete->title = $titleUpdete;
        file_put_contents($slugUpdete, serialize($objTelegraphTextUpdete));
    }

    public function delete ($slugDelete): void
    {
        unlink($slugDelete);
    }

    public function list (): string
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
$objTelegraphText = new TelegraphText('Sergey', 'test_text_file_2022_11_26_28.txt');
$objTelegraphText->title = "Заголовок";
$objTelegraphText->text = "Текст, текст, текст";

//--------- создание -------------
$slugReturn = $objFileStorage->create($objTelegraphText);
print_r($slugReturn);
//--------- создание -------------

//--------- просмотр одного файла -------------
//$slugRead = 'test_text_file_2022_11_28_5.txt';
// Просмотр последнего созданного файла
//print_r($objFileStorage->read($objTelegraphText->slug));
//--------- просмотр одного файла -------------

//--------- обновление -------------
$slugUpdete = 'test_text_file_2022_11_28_4.txt';
$titleUpdete = 'Новый заголовок!';
//$objTelegraphTextUpdete = unserialize(file_get_contents($slugUpdete));
//$objFileStorage->update($slugUpdete, $titleUpdete, $objTelegraphTextUpdete);
//--------- обновление -------------

//--------- удаление -------------
$slugDelete = 'test_text_file_2022_11_28_4.txt';
//$objFileStorage->delete($slugDelete);
//--------- обновление -------------

//--------- просмотр текстов всех файлов -------------
//$objFileStorage->list();
//--------- просмотр текстов всех файлов -------------
