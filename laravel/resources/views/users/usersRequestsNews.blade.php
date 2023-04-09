@extends('layouts.app')
@section('content')
    @if($errors->any())
        @foreach($errors->all() as $error)
            <x-alert type="danger" :message="$error" ></x-alert>
        @endforeach
    @endif
    @include('messages')
    <div class="form-control-sm">
        <form method="post" action="{{route('order.store')}}">
            @csrf
            <div class="mb-3">
                <label for="user_name" class="form-label">Name</label>
                <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Alexandr Voronov" value="{{old('user_name')}}">
            </div>
            <div class="mb-3">
                <label for="phone_number" class="form-label">Phone number</label>
                <input type="tel" class="form-control" id="phone_number" name="phone_number" placeholder="+999999999999" value="{{old('phone_number')}}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" value="{{old('email')}}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Describe you order</label>
                <textarea class="form-control" name="description" id="description" rows="3">{!! old('description') !!}</textarea>
            </div>
            <button class="btn btn-success" type="submit">Send</button>
        </form>

    </div>

@endsection
