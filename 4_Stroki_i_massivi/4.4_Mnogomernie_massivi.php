<?php
$list1 = [1,2,3,4,5,6,7,];
$list2 = [4,5,6,];

$list = [
    's1' => $list1,
    's2' => $list2,
    's3' => [1,2,3,],
];

var_dump($list['s3']['1']);

$cities = [
    'russia' => [
        'Moscow' => 'Msk',
        'Spb' => 'Piter',
    ],
    'Germany' => [
        'Moscow' => 'Msk2',
        'Spb' => 'Piter2',
    ],
    'France' => [
        '1dfs' => 'sdf',
        '4fds' => 'asd',
    ],
];

var_dump($cities['russia']['Spb']);