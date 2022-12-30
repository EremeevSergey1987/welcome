<?php
class TelegraphText
{
    private $text;
    private $title;
    private $author;
    private $published;
    private $slug;

    /**
     * @throws Exception
     */
    public function __set($name, $value)
    {
        if($name == 'title'){
            $this->title = $value;
        }

        if($name == 'text'){
            $this->text = $value;
            if(strlen(trim($this->text)) == 0 || strlen(trim($this->text)) > 500)
            {
                throw new Exception('Поле "text" должно быть заполнено и иметь длину не более 500 символов!');
            }
       }

        if($name == 'author'){
            $this->author = $value;
            if(strlen($value) > 120){
                echo 'Слишком длинное имя пользователя. Длина равна ' . strlen($value);
            }
        }
        if($name == 'slug'){
            $this->slug = $value;
            if(!preg_match("/^([a-z0-9_\.]+$)/", $value)){
                echo 'Значение поля slug является не корректным!';
            }
        }
        if($name == 'published'){
            $this->published = $value;
            $currentDate = date("Y-m-d");
            if($this->published >= $currentDate){
                return true;
            }
            else{
                echo 'Дата меньше текущей' . PHP_EOL;
            }
        }
    }


    public function __get($name)
    {
        if($name == 'text'){
            return $this->text;
        }
        if($name == 'author'){
            return $this->author;
        }
        if($name == 'slug'){
            return $this->slug;
        }
        if($name == 'published'){
            return $this->published;
        }
    }



    public function __construct(string $slug)
    {
        $this->slug = $slug;
        $this->published = date("Y-m-d");
        return $this->published;

    }

    private function storeText(): string
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
    private function loadText($slug): string
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