@extends('layouts.app')

@section('content')
    <div>
        Welcome to news page
    </div>
    @if($errors->any())
        @foreach($errors->all() as $error)
            <x-alert type="danger" :message="$error" ></x-alert>
        @endforeach
    @endif
    @include('messages')
    <div class="btn-group me-2">
        <a href="{{route('order.index')}}" class="btn btn-sm btn-outline-secondary">order unloading news</a>
    </div>
    <div class="btn-group me-2">
        <a href="{{route('news.categories')}}" class="btn btn-sm btn-outline-secondary">go to news categories</a>
    </div>
    <div class="offset-2 col-8">
        <br>
        <h2>
            Write you feedback
        </h2>
        <form method="post" action="{{route('feedback.store')}}">
            @csrf
            <div class="form-group">
                <label for="user_name">Your name</label>
                <input type="text" class="form-control" name="user_name" id="user_name">
            </div>
            <div class="form-group">
                <label for="feedback">Your feedback</label>
                <textarea class="form-control" name="feedback" id="feedback"></textarea>
            </div><br>
            <button class="btn btn-success" type="submit">Send</button>
        </form>
    </div>
@endsection
