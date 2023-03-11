<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = $this->getCategory();
        //dump($categories);
        return view('news.categories', [
            'categories' => $categories
        ]);
    }

    public function show($id){
        $currentCategory = $this->getCategory($id);
        //dump($currentCategory);
        return view('news.newsByCategory',[
            'categories' => $currentCategory
        ]);
    }
}
