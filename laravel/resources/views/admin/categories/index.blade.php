@extends('layouts.admin')
@section('content')
    <h1 >Categories</h1>
    <a href="{{route('admin.categories.create')}}" class="btn btn-primary" style="float:right;">add category</a>
    <div class="table-responsive">
        category
    </div>
@endsection

