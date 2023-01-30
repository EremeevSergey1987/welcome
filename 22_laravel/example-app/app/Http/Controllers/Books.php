<?php
namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class Books extends Controller
{
    public function listBooks(){
        $books = Book::all();
        return new Response(json_encode($books));
    }
    public function postBook(Request $request){
        $name = $request->get('name');
        $author = $request->get('author');
        $price = $request->get('price');
        $book = new Book();
        $book->name = $name;
        $book->author = $author;
        $book->price = $price;
        $book->save();
    }

    public function uploadBook(Request $request){
        $name = $request->get('name');
        $author = $request->get('author');
        $price = $request->get('price');
        $id = $request->get('id');
        Book::find($id)->update(['name' => $name, 'author' => $author, 'price' => $price]);
    }

    public function deleteBook($id){
        $book = Book::where('id', '=', $id)->delete();

    }
}
