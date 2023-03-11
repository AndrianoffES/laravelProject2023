<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(){

        //news list
        $news = $this->getNews();
        $category = $this->getCategory();
        return view('news.index', [
            'newsList' => $news,
            'category' => $category
        ]);
    }

    public function show(int $id){
        //current news
        $news = $this->getNews($id);
        return view('news.show',[
            'news' => $news
        ]);
    }
}
