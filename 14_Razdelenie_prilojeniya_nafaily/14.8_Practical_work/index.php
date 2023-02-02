<?php
require_once 'interfaces/LoggerInterface.php';
require_once 'interfaces/EventListenerInterface.php';
require_once 'entities/View.php';

include_once 'autoload.php';

$objFileStorage = new FileStorage();
$objTelegraphText = new TelegraphText('test_text_file_2022_11_26_28.txt');

$objTelegraphText->title = "Заголовок";
$objTelegraphText->author = 'Sergey';
$objTelegraphText->published = date("Y-m-d");
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
$objFileStorage->list();
//--------- просмотр текстов всех файлов -------------