@extends('layouts.admin')
@section('content')
    <div class="offset-2 col-8">
        <br>
        <h2>
            Add category
        </h2>
{{--        @if($errors->eny())--}}
{{--            @foreach($errors->all() as $error)--}}
{{--                @include('inc.message', ['message'=>$error])--}}
{{--            @endforeach--}}
{{--        @endif--}}
        <form method="post" action="{{route('admin.categories.store')}}">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" id="title" value="{{old('title')}}">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description" >{!! old('description') !!}</textarea>
            </div><br>
            <button class="btn btn-success" type="submit">Save</button>
        </form>
    </div>

@endsection
