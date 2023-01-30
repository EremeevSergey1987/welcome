<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class TestRequest extends Controller
{
    protected $testArray = [1,2,3,4,5,6,7,8,9,10,11,12];
    public function testGet(Request $request){
        $itemsNumber = $request->get('items');
        for($i=0; $i < $itemsNumber; $i++){
            echo $this->testArray[$i] . '<br>';
        }
    }
    public function testPost(Request $request){
//        $newItem = $request->get('item');
        //print_r($request->all());
        //echo $request->fullUrl() . PHP_EOL . $request->getRequestUri();
        echo $request->header('Content-typels');
//        $this->testArray[] = $newItem;
//        print_r($this->testArray);
    }
}
