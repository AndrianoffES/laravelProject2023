<?php

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


//    public function getNews(int $id =null): array{
//        $facker = Factory::create();
//
//        if ($id){
//            return [
//                'category' => $this->getRandomCategory(),
//                'title'=> $facker->jobTitle(),
//                'author' => $facker->userName(),
//                'description' => $facker->text(100),
//                'created_at' => now('Europe/Madrid')
//
//            ];
//        }
//        $news = [];
//        for($i=1;$i<20;$i++){
//            $category = $this->getRandomCategory();
//            $categoryId=$category['id'];
//            $categoryName=$category['name'];
//            $news[$i]=[
//                'id'=> $i,
//                'category' => $categoryName,
//                'categoryId' => $categoryId,
//                'title'=> $facker->jobTitle(),
//                'author' => $facker->userName(),
//                'description' => $facker->text(100),
//                'created_at' => now('Europe/Madrid')
//
//                ];
//
//        }
//        return $news;
//    }
//    private function getRandomCategory(): array
//    {
//        $categories = $this->getCategory();
//        $randomIndex = array_rand($categories);
//        return $categories[$randomIndex];
//    }
//
//
//
//    public function getNewsByCategory(int $categoryId): array
//    {
//        $newsByCategory = [];
//        foreach ($this->getNews() as $newsItem) {
//           // dump($newsItem);
//            if ($newsItem['categoryId'] == $categoryId) {
//                $newsByCategory[] = $newsItem;
//            }
//        }
//        return $newsByCategory;
//    }
//    public function getCategory($id = null): array
//    {
//        if($id){
//            return $this->getNewsByCategory($id);
//        }
//        $categories = [
//            ['id' => 1, 'name' => 'Sports'],
//            ['id' => 2, 'name' => 'Politics'],
//            ['id' => 3, 'name' => 'Entertainment'],
//            ['id' => 4, 'name' => 'Technology'],
//            ['id' => 5, 'name' => 'Science']
//        ];
//
//
//        return $categories;
//    }
}
