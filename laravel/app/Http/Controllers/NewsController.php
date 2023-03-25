<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(){

        //news list
        $news = News::query()->paginate(3);

        return view('news.index', [
            'newsList' => $news
        ]);
    }

    public function show($id){

        $news=News::query()->find($id);
        return view('news.show',[
            'news' => $news

        ]);
    }
    public function newsByCategory(Category $category)
    {
      //  dump($category);
        return view('news.newsByCategory',[
            'news' => $category->news()->get(),
            'category' => $category
        ]);
    }
}
