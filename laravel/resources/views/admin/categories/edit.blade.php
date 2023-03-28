@extends('layouts.admin')
@section('content')

<div class="offset-2 col-8">
    <br>
    <h2>
        Edit category
    </h2>
    @if($errors->any())
        @foreach($errors->all() as $error)
            <x-alert type="danger" :message="$error" ></x-alert>
        @endforeach
    @endif
    @include('messages')
    <form method="post" action="{{route('admin.categories.update', ['category' => $categories])}}">
        @method('put')
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title" value="{{$categories->title}}">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="description">{!! $categories->description !!}</textarea>
        </div><br>
        <button class="btn btn-success" type="submit">Save</button>
    </form>
</div>
@endsection
