<?php
class FileStorage extends Storage{
    // сохраняет сериализованный объект класса TelegraphText

    public function create (&$objTelegraphText)
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