<?php
$searchRoot = 'first_dir';
$searchName = 'test.txt';
$searchResult = [];

function serchFile(string $searchRoot, string $searchName, &$searchResult)
{
    $listElementsDir = scandir($searchRoot);
    for($i = 2; $i < count($listElementsDir); $i++){
        $is_dir = is_dir($searchRoot . DIRECTORY_SEPARATOR . $listElementsDir[$i]);
        if($is_dir){
            serchFile($searchRoot . DIRECTORY_SEPARATOR . $listElementsDir[$i], $searchName, $searchResult);
        }
        else{
            if($listElementsDir[$i] == $searchName){
                if(filesize($searchRoot . DIRECTORY_SEPARATOR . $searchName))
                {
                    $searchResult[] = $searchRoot . DIRECTORY_SEPARATOR . $searchName . " - " . filesize($searchRoot . DIRECTORY_SEPARATOR . $searchName);
                }
            }
            else{
                return "Поиск не дал результатов!";
            }
        }
    }
    return $searchResult;
}
$result = serchFile($searchRoot, $searchName, $searchResult);
print_r($result);