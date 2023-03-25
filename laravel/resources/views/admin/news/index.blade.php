@extends('layouts.admin')
@section('content')
    <h1 class="h2">News</h1>
    <div class="btn-toolbar mb-2 mb-md-0">


    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th>#ID</th>
                <th>Category</th>
                <th>Title</th>
                <th>Description</th>
                <th>Author</th>
                <th>Actions</th>
            </tr>
            @php //dump($news) @endphp
            @foreach($news as $newsItem)
                <tr>
                    <td>{{$newsItem->id}}</td>
                    <td>{{$newsItem->category->title}}</td>
                    <td>{{$newsItem->status}}</td>
                    <td>{{$newsItem->title}}</td>
                    <td>{{$newsItem->author}}</td>
                    <td>{{$newsItem->created_at}}</td>
                    <td>
                        <a href="{{route('admin.news.edit', $newsItem)}}">Edit</a>&nbsp;|&nbsp;
                        <form action="{{route('admin.news.destroy', $newsItem)}}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="color:red; border:none; background:none; padding:0; margin:0; cursor: pointer;">Del</button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </table>
        {{$news->links()}}
    </div>
    <div class="btn-group me-2">
        <a href="{{route('admin.news.create')}}" class="btn btn-primary">add news</a>
    </div>
@endsection
