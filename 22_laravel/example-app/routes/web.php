<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestMessage;
use App\Http\Controllers\TestRequest;
use App\Http\Controllers\ArrayTest;
use App\Http\Controllers\Books;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TextController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/show-message/{iterations}', [TestMessage::class, 'showMessage'])->name('show-message');
Route::get('/test-array', [TestRequest::class, 'testGet']);
Route::post('/test-array', [TestRequest::class, 'testPost']);
Route::get('/array-color', [ArrayTest::class, 'showColor']);

Route::get('/books', [Books::class, 'listBooks']);
Route::post('/books', [Books::class,'postBook']);
Route::put('/books', [Books::class, 'uploadBook']);
Route::delete('/books/{id}', [Books::class, 'deleteBook']);

Route::get('/telegraph_text', [TextController::class, 'list']);
Route::post('/telegraph_text', [TextController::class, 'add']);
Route::put('/telegraph_text', [TextController::class, 'update']);
Route::delete('/telegraph_text/{id}', [TextController::class, 'delete']);

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
