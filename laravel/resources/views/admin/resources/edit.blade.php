@extends('layouts.admin')
@section('content')

    <div class="offset-2 col-8">
        <br>
        <h2>
            Edit resource link
        </h2>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message="$error" ></x-alert>
            @endforeach
        @endif
        @include('messages')
        <form method="post" action="{{route('admin.resources.update', ['resource' => $resource])}}">
            @method('put')
            @csrf
            <div class="form-group">
                <label for="link">Link</label>
                <input type="text" class="form-control" name="link" id="link" value="{{$resource->link}}">
            </div>
            <button class="btn btn-success" type="submit">Save</button>
        </form>
    </div>
@endsection
