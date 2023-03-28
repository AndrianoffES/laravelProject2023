<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){

        $categories = Category::all();

       //dump($categories);
        return view('news.categories', [
            'categories' => $categories
        ]);
    }

    public function show(News $news){
        $currentCategory =$news;

        dump($currentCategory->category());
        return view('news.newsByCategory',[
            'categories' => $currentCategory->category()
        ]);
    }

    public function news($id){
        $currentCategory = app(News::class);

    }
}
