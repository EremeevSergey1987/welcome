<?php
$searchRoot = 'first_dir';
$searchName = 'test.txt';
$searchResult = [];

function serchFile(string $searchRoot, string $searchName, &$searchResult)
{
    $listElementsDir = scandir($searchRoot);
        for ($i = 2; $i < count($listElementsDir); $i++) {
            $is_dir = is_dir($searchRoot . DIRECTORY_SEPARATOR . $listElementsDir[$i]);
            if ($is_dir) {
                serchFile($searchRoot . DIRECTORY_SEPARATOR . $listElementsDir[$i], $searchName, $searchResult);
            } else {
                if ($listElementsDir[$i] == $searchName){
                    $searchResult[] = $searchRoot . DIRECTORY_SEPARATOR . $searchName;
                } else {
                    return "Поиск не дал результатов!";
                }
            }
        }
    return $searchResult;
}

$searchResult = serchFile($searchRoot, $searchName, $searchResult);

function filterArray($var){
    if(filesize($var)){
        return $var;
    }
}
$searchResultFilter = array_filter($searchResult, "filterArray");
print_r($searchResultFilter);

