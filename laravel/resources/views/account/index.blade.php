@extends('layouts.app')
@section('content')
    <h2>Welcome {{Auth::user()->name}}</h2>
    @if(Auth::user()->is_admin===true)


    <a href="{{route('admin.index')}}">Go to admin</a>
    @endif
@endsection
