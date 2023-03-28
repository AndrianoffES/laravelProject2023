<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use PhpParser\Builder;

class News extends Model
{
    use HasFactory;
    protected $table = 'news';
    public $timestamps=false;
    protected $fillable=[
        'title',
        'author',
        'status',
        'image',
        'body',

    ];

    public function category(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'categories_has_news', 'news_id', 'category_id');
    }

//    public function getNews(array $columns = ['*']):Collection
//    {
//        return DB::table($this->table)
//            ->join('categories_has_news as chn', 'news.id','=', 'chn.news_id')
//            ->leftJoin('categories', 'chn.category_id', '=', 'categories.id')
//            ->select('news.*', 'categories.title as category_title')
//            ->get($columns);
//    }
//
//    public function getNewsById(int $id, array $columns = ['*'])
//    {
//       return DB::table($this->table)->find($id, $columns);
//    }
//
//    public function getNewsByCategory($id, array $columns=['*'])
//    {
//        return DB::table($this->table)
//            ->join('categories_has_news as chn', 'news.id','=', 'chn.news_id')
//            ->leftJoin('categories', 'chn.category_id', '=', 'categories.id')
//            ->select('news.*', 'categories.title as category_title')
//            ->where('category_id', '=', $id)
//            ->get($columns);
//    }
}
