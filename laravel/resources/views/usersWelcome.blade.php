@extends('layouts.main')

@section('content')
    <div>
        Welcome to news page
    </div>
    <div class="btn-group me-2">
        <a href="{{route('news.categories')}}" class="btn btn-sm btn-outline-secondary">go to news categories</a>
    </div>
@endsection
