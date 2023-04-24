@extends('layouts.admin')
@section('content')
    <div class="offset-2 col-8">
        <br>
        <h2>
            Add resource link
        </h2>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message="$error" ></x-alert>
            @endforeach
        @endif
        @include('messages')
        <form method="post" action="{{route('admin.resources.store')}}">
            @csrf
            <div class="form-group">
                <label for="link">Title</label>
                <input type="text" class="form-control" name="link" id="link" value="{{old('link')}}">
            </div>
            <button class="btn btn-success" type="submit">Save</button>
        </form>
    </div>

@endsection
