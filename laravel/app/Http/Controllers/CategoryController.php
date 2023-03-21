<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){

        $categories = app(Category::class);

       // dump($categories->getCategories());
        return view('news.categories', [
            'categories' => $categories->getCategories()
        ]);
    }

    public function show($id){
        $currentCategory = app(News::class);
        //dump($currentCategory);
        return view('news.newsByCategory',[
            'categories' => $currentCategory->getNewsByCategory($id)
        ]);
    }

    public function showNewsByCategory($id){
        $currentCategory = app(News::class);

    }
}
