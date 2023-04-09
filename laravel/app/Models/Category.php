<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;
    protected $table='categories';

    protected $fillable = [
      'title',
      'description'
    ];

    public function news(): BelongsToMany
    {
        return $this->belongsToMany(News::class, 'categories_has_news', 'category_id', 'news_id');
    }

//    public function getCategories(array $columns=['*']): Collection
//    {
//        return DB::table($this->table)
//            ->get(['id', 'title']);
//    }
//
//    public function getCategoryById($id, array $columns=['*'])
//    {
//        return DB::table($this->table)
//        ->find($id, $columns);
//    }


}
