<?php

namespace App\Queries;



use App\Models\News;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

final class NewsQueryBuilder
{
    private Builder $model;
    public function __construct()
    {
        $this->model = News::query();
    }
    public function getNews(): Collection
    {
        return $this->model->get();
    }
}
