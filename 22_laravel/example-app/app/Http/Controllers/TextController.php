<?php
namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\TelegraphText;
use \Cviebrock\EloquentSluggable\Services\SlugService;
class TextController extends Controller
{
    public function list()
    {
        $TelegraphText = TelegraphText::all();
        $view = view('telegraph')->with(['telegraph' => $TelegraphText]);
        return new Response($view);
    }
    public function add(Request $request)
    {
        $title = $request->get('title');
        $text = $request->get('text');
        $author = $request->get('author');
        $TelegraphText = new TelegraphText();
        $TelegraphText->title = $title;
        $TelegraphText->text = $text;
        $TelegraphText->author = $author;
        $TelegraphText->slug = SlugService::createSlug(TelegraphText::class, 'slug', $TelegraphText->title);
        $TelegraphText->save();
        return new RedirectResponse('/telegraph_text');
    }
    public function update(Request $request)
    {
        $title = $request->get('title');
        $text = $request->get('text');
        $author = $request->get('author');
        $id = $request->get('id');
        $slug = SlugService::createSlug(TelegraphText::class, 'slug', $title);
        TelegraphText::find($id)->update(['title'=>$title, 'text'=>$text, 'author'=>$author, 'slug'=>$slug]);
        return new RedirectResponse('/telegraph_text');
    }
    public function delete($id)
    {
        TelegraphText::where('id', '=', $id)->delete();
        return new RedirectResponse('/telegraph_text');
    }
}
