<?php
$testArray = ['testValue' => 1];
header('Content-Type:application/json');

if(isset($_GET['password']) && $_GET['password'] == 12345){
    if(isset($testArray[$_GET['array_key']])){
        echo json_encode($testArray[$_GET['array_key']]);
    }
    else{
        http_response_code(500);
    }
}
else{
    http_response_code(403);
    echo 'Password is missing!';
}