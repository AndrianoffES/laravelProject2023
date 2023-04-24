<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\JobNewsParsing;
use App\Models\News;
use App\Models\Resource;
use App\Services\Contracts\Parser;
use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Parser $parser)

    {
        $links = Resource::all();
        //dd($links);
        foreach ($links as $link){
            dispatch(new JobNewsParsing($link->link));
            }

        return "OK";


        }
}


//foreach ($load as $item){
//    foreach ($item as $value){
//        $news = new News();
//        $news->title = $value['title'];
//        $news->author = $value['author'];
//        $news->body = $value['description'];
//        $news->image = $value['enclosure::url'];
//        $news->save();
//
//
//    }
//    return redirect('admin');

//[
//    'https://news.rambler.ru/rss/technology',
//    'https://news.rambler.ru/rss/army',
//    'https://news.rambler.ru/rss/games',
//    'https://news.rambler.ru/rss/starlife'
//]
