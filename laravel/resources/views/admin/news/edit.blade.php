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
        <form method="post" action="{{route('admin.news.update', $news)}}">
            @method('put')
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" id="title" value="{{$news->title}}">
            </div>
            <div class="form-group">
                <label for="body">Description</label>
                <textarea class="form-control" name="body" id="body" >{!! $news->body !!}</textarea>
            </div><br>
            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" class="form-control" name="author" id="author" value="{{old('author')}}">
            </div>
            <div class="form-group">
                <label for="category_id">Choose the category</label>
            <select class="form-select" aria-label="Default select example" name="category[]" id="category" multiple>
                <option value="0" selected>Choose</option>

                @foreach($categories as $item)
                    <option @if(in_array($item->id, $news->category->pluck('id')->toArray())) selected @endif value="{{$item->id}}">{{$item->title}}</option>
                @endforeach

            </select>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" name="status" id="status">
                    @foreach($statuses as $status)
                        <option @if($news->status==$status) selected @endif>{{$status}}</option>
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
