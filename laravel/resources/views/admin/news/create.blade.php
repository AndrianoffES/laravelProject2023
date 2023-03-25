@extends('layouts.admin')
@section('content')

<div class="offset-2 col-8">
    <br>
    <h2>
        Add news
    </h2>
    {{--        @if($errors->eny())--}}
    {{--            @foreach($errors->all() as $error)--}}
    {{--                @include('inc.message', ['message'=>$error])--}}
    {{--            @endforeach--}}
    {{--        @endif--}}
    <form method="post" action="{{route('admin.news.store')}}">

        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title" value="{{old('title')}}">
        </div>
        <div class="form-group">
            <label for="body">Description</label>
            <textarea class="form-control" name="body" id="body" >{!! old('body') !!}</textarea>
        </div><br>
        <select class="form-select" aria-label="Default select example" name="category_id" id="category_id">
            <option selected>Choose the category</option>

            @foreach($categories as $item)
                <option value="{{$item->id}}">{{$item->title}}</option>
            @endforeach

        </select>
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" name="status" id="status">
                <option @if(old('status') === 'PUBLISHED') selected @endif>PUBLISHED</option>
                <option @if(old('status') === 'DRAFT') selected @endif>DRAFT</option>
                <option @if(old('status') === 'BLOCKED') selected @endif>BLOCKED</option>
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
