@extends('layouts.main')
@section('content')

<div class="container">
    <div class="btn-group me-2">
        <a href="{{route('news.categories')}}" class="btn btn-sm btn-outline-secondary">go to news categories</a>
    </div>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <div class="col">
            <div class="card shadow-sm">
                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text class="titleText" x="50%" y="50%" fill="#eceeef" dy=".3em">{{$news['category']['name']}}: {{$news['title']}}</text></svg>
                <div class="card-body">
                    <p class="card-text">{{$news['description']}}</p>
                    <div class="d-flex justify-content-between align-items-center">

                        <small class="text-muted">{{$news['author']}} | date: {{$news['created_at']}}</small>
                    </div>
                    <div class="btn-group">
                        <a href="{{route('news.index')}}" class="btn btn-sm btn-outline-secondary">Back</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
