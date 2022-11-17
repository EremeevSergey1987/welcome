<?php
$searchRoot = 'first_dir';
$searchName = 'test6.txt';
$searchResult = [];

function searchFile(string $searchRoot, string $searchName, &$searchResult)
{
    $listElementsDir = scandir($searchRoot);
        for ($i = 2; $i < count($listElementsDir); $i++) {
            $is_dir = is_dir($searchRoot . DIRECTORY_SEPARATOR . $listElementsDir[$i]);
            if ($is_dir) {
                searchFile($searchRoot . DIRECTORY_SEPARATOR . $listElementsDir[$i], $searchName, $searchResult);
            } else {
                if ($listElementsDir[$i] == $searchName) {
                    $searchResult[] = $searchRoot . DIRECTORY_SEPARATOR . $searchName;
                } else {
                    return "Поиск не дал результатов!";
                }
            }
        }
    return $searchResult;
}

$searchResult = searchFile($searchRoot, $searchName, $searchResult);

if (gettype($searchResult) == 'array') {
    function filterArray($var)
    {
        if (filesize($var)) {
            return $var;
        }
    }
$searchResultFilter = array_filter($searchResult, "filterArray");
} else {
    $searchResultFilter = $searchResult;
}
print_r($searchResultFilter);
