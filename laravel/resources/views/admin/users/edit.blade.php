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
        <form method="post" action="{{route('admin.users.update', $user)}}">
            @method('put')
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <textarea class="form-control" name="email" id="email" >{!! $user->email !!}</textarea>
            </div><br>
            <div class="form-group">
                <label for="category_id">Choose the status</label>
                <select class="form-select" aria-label="Default select example" name="is_admin" id="is_admin">
                    <option value="0" selected>Choose</option>
                        <option @if($user->is_admin===true) value="0">false</option>
                    @else <option value="1">true</option> @endif
                </select>
            </div>


            <button class="btn btn-success" type="submit">Save</button>
        </form>
    </div>
@endsection
