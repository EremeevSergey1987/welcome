<?php

$textStorage = [];

function add(string $title, string $text, array &$textStorage) : void
{
    $textStorage[] = ['title'=>$title,'text'=>$text];
}
add('Новости Москвы', 'В Москве ...', $textStorage);
add('Выгодные вклады!', 'Вклады под 20% ...', $textStorage);
print_r($textStorage);

function remove(int $id, array &$textStorage): bool
{
    $res = array_key_exists($id, $textStorage);
    if($res){
        unset($textStorage[$id]);
        return true;
    }
    else{
        return false;
    }

}

var_dump(remove(0, $textStorage));
print_r($textStorage);

var_dump(remove(5, $textStorage));
print_r($textStorage);

function edit(int $id, string $newTitle, string $newText, &$textStorage) : bool
{
    $res = array_key_exists($id, $textStorage);
    if($res){
        $textStorage[$id]['title'] = $newTitle;
        $textStorage[$id]['text'] = $newText;
        return true;
    }
    else{
        return false;
    }

}
$idEdit = 1;
$newTitle = "Выгодные вклады только у нас!";
$newText = "Приходи к нам!";
var_dump(edit($idEdit, $newTitle, $newText, $textStorage));
print_r($textStorage);

$idEditFalse = 7;
var_dump(edit($idEditFalse, 'Title false', 'Text false', $textStorage));
print_r($textStorage);
