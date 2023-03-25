<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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

    public function news()
    {
        return $this->hasMany(News::class);
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
