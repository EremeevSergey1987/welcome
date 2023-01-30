<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestMessage extends Controller
{
    /**
     * @param int $iterations
     */
    public function showMessage($iterations)
    {
        for($i = 0; $i<$iterations; $i++) {
        echo 'This is test message!' . PHP_EOL;
        }
    }
}
