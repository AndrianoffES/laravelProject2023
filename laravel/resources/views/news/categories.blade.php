
@extends('layouts.app')
@section('content')

    <div class="btn-group me-2">
        <a href="{{route('news.index')}}" class="btn btn-sm btn-outline-secondary">go to all news</a>
    </div>

 @forelse($categories as $item)
    <div>
        <h1><a href="<?=route('newsByCategory', $item->id)?>"><?=$item->title?></a></h1>
        <hr>
    </div>
 @empty
     <h3>No categories</h3>
 @endforelse
@endsection
