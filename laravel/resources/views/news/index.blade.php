
@extends('layouts.main')
@section('content')

    <div class="container">

        <div class="btn-group me-2">
            <a href="{{route('news.categories')}}" class="btn btn-sm btn-outline-secondary">go to news categories</a>
        </div>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @forelse( $newsList as $item)
                @php // dd($newsList) @endphp
            <div class="col">
                <div class="card shadow-sm">
                    <img src="{{$item->image}}" class="card-img-top" alt="...">  {{$item->title}}
                    <div class="card-body">
                        <p class="card-text">{{$item->body}}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="{{route('news.show',$item->id)}}" class="btn btn-sm btn-outline-secondary">View</a>
                            </div>
                            <small class="text-muted">{{$item->author}} | date: {{$item->created_at}}</small>
                        </div>
                    </div>
                </div>
            </div>
            @empty
                <h3>No rows</h3>
            @endforelse
            {{$newsList->links()}}
        </div>

    </div>


@endsection




