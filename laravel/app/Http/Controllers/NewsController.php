<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(){

        //news list
        $news = $this->getNews();

        return view('news.index', [
            'newsList' => $news,

        ]);
    }

    public function show(int $id){
        //current news
        $category = $this->getCategory();
       // dump($category);
        $news = $this->getNews($id);
        return view('news.show',[
            'news' => $news,
            'category' => $category
        ]);
    }
}
