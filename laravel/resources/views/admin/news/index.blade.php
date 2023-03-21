@extends('layouts.admin')
@section('content')
    <h1 class="h2">News</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="" class="btn btn-sm btn-outline-secondary">add news</a>
        </div>

    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th>#ID</th>
                <th>Category</th>
                <th>Title</th>
                <th>Author</th>
                <th>Add date</th>
                <th>Actions</th>
            </tr>
            @php dump($news) @endphp
            @foreach($news as $newsItem)
                <tr>
                    <td>{{$newsItem->id}}</td>
                    <td>{{$newsItem->category_title}}</td>
                    <td>{{$newsItem->title}}</td>
                    <td>{{$newsItem->author}}</td>
                    <td>{{$newsItem->created_at}}</td>
                    <td><a href="">Edit</a>&nbsp;|&nbsp; <a href="" style="color:red;">Del</a> </td>
                </tr>
            @endforeach

        </table>
    </div>
@endsection
