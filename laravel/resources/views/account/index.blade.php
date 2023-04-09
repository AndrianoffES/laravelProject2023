@extends('layouts.app')
@section('content')
    <h2>Welcome {{Auth::user()->name}}</h2>
    @if(Auth::user()->avatar)
        <img src="{{ Auth::user()->avatar }}" style="width:200px;"
    @endif
    <br><br><br>
    @if(Auth::user()->is_admin===true)
        <a href="{{route('admin.index')}}" class="btn btn-sm btn-outline-secondary navbar-brand">GO TO ADMIN</a>
    @endif
@endsection
