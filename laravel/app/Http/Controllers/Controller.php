<?php

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    public function getNews(int $id =null): array{
        $facker = Factory::create();

        if ($id){
            return [
                'title'=> $facker->jobTitle(),
                'author' => $facker->userName(),
                'description' => $facker->text(100),
                'created_at' => now('Europe/Madrid')

            ];
        }
        $news = [];
        for($i=1;$i<10;$i++){
            $news[$i]=[
                'title'=> $facker->jobTitle(),
                'author' => $facker->userName(),
                'description' => $facker->text(100),
                'created_at' => now('Europe/Madrid')

            ];
        }
        return $news;
    }
}
