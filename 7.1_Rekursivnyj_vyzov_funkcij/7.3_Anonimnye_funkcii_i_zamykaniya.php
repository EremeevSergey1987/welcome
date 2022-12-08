<?php
$password = "password";
$chekPassword = function ($userPassword) use(&$password) {
    return $userPassword === $password;
};

$password = 'nnn';

do{
    $userPassword = readline('Введите пароль');
    if($chekPassword($userPassword)){
        echo "Пароль верный!";
        break;
    }
    else{
        echo "Пароль не верный!" . PHP_EOL;
    }
}
while(true);

//if( $chekPassword('password') ){
//    echo "Пароль верный!";
//}
//else{
//    echo "Пароль не выерный";
//}