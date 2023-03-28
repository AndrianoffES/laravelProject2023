@extends('layouts.admin')
@section('content')

<div class="offset-2 col-8">
    <br>
    <h2>
        Add news
    </h2>
    @if($errors->any())
        @foreach($errors->all() as $error)
            <x-alert type="danger" :message="$error" ></x-alert>
        @endforeach
    @endif
    <form method="post" action="{{route('admin.news.store')}}" enctype="multipart/form-data">

        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title" value="{{old('title')}}">
        </div>
        <div class="form-group">
            <label for="body">Description</label>
            <textarea class="form-control" name="body" id="body" >{!! old('body') !!}</textarea>
        </div><br>
        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" class="form-control" name="author" id="author" value="{{old('author')}}">
        </div>
        <select class="form-select" aria-label="Default select example" name="category[]" id="category" multiple>
            <option selected>Choose the category</option>

            @foreach($categories as $item)
                <option value="{{$item->id}}">{{$item->title}}</option>
            @endforeach

        </select>
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" name="status" id="status">
                @foreach($statuses as $status)
                    <option>{{$status}} </option>
                @endforeach


            </select>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" name="image" id="image" >
        </div>
        <button class="btn btn-success" type="submit">Save</button>
    </form>
</div>
@endsection
