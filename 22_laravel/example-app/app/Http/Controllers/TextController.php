<?php
namespace App\Http\Controllers;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\TelegraphText;
use \Cviebrock\EloquentSluggable\Services\SlugService;
class TextController extends Controller
{
    public function list(){
        $TelegraphText = TelegraphText::all();
        return new Response(json_encode($TelegraphText));
    }
    public function add(Request $request){
        $title = $request->get('title');
        $text = $request->get('text');
        $author = $request->get('author');
        $TelegraphText = new TelegraphText();
        $TelegraphText->title = $title;
        $TelegraphText->text = $text;
        $TelegraphText->author = $author;
        $TelegraphText->slug = SlugService::createSlug(TelegraphText::class, 'slug', $TelegraphText->title);
        $TelegraphText->save();

    }
    public function update(Request $request){
        $title = $request->get('title');
        $text = $request->get('text');
        $author = $request->get('author');
        $id = $request->get('id');
        //$slug = Str::slug($request->title);
        TelegraphText::find($id)->update(['title'=>$title, 'text'=>$text, 'author'=>$author, 'slug'=>$slug, 'id' => $id]);
    }
    public function delete($id){
        TelegraphText::where('id', '=', $id)->delete();
    }
}
