@extends('layouts.main')
@section('content')
    <div class="form-control-sm">
        <form method="post" action="{{route('order.store')}}">
            @csrf
            <div class="mb-3">
                <label for="inputName" class="form-label">Name</label>
                <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Alexandr Voronov" value="{{old('inputName')}}">
            </div>
            <div class="mb-3">
                <label for="inputPhone" class="form-label">Phone number</label>
                <input type="tel" class="form-control" id="inputPhone" name="inputPhone" placeholder="+999999999999" value="{{old('inputPhone')}}">
            </div>
            <div class="mb-3">
                <label for="inputEmail" class="form-label">Email address</label>
                <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="name@example.com" value="{{old('inputEmail')}}">
            </div>
            <div class="mb-3">
                <label for="inputDescription" class="form-label">Describe you order</label>
                <textarea class="form-control" name="inputDescription" id="inputDescription" rows="3">{!! old('inputDescription') !!}</textarea>
            </div>
            <button class="btn btn-success" type="submit">Send</button>
        </form>

    </div>

@endsection
