<?php
$searchRoot = 'first_dir';
$searchName = 'test.txt';
$searchResult = [];

function serchFile(string $searchRoot, string $searchName, &$searchResult)
{

    $listElementsDir = scandir($searchRoot);
    $count = count($listElementsDir);
    for($i = 2; $i < $count; $i++){
        $is_dir = is_dir($searchRoot . DIRECTORY_SEPARATOR . $listElementsDir[$i]);

        if($is_dir){
            serchFile($searchRoot . DIRECTORY_SEPARATOR . $listElementsDir[$i], $searchName, $searchResult);
        }

        if($listElementsDir[$i] == $searchName){
            $searchResult[] = $searchRoot . DIRECTORY_SEPARATOR . $searchName;
            return $searchResult;
        }
        else{

        }

    }
}
$result = serchFile($searchRoot, $searchName, $searchResult);
print_r($result);
