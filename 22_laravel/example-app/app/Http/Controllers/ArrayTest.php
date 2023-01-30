<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class ArrayTest extends Controller
{
    //
    protected $arrayTest = ['Red', 'Yellow', 'Blue'];

    public function showColor(Request $request)
    {
        $colorNumber = $request->get('color');
        $view = view('show-color')->with(['color' => $colorNumber, 'colorsArray' => $this->arrayTest]);
        return new Response($view);
    }
}
