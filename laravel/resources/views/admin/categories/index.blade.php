@extends('layouts.admin')
@section('content')
    <h1 >Categories</h1>

    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th>#ID</th>
                <th>Title</th>
                <th>Description</th>
            </tr>
            @foreach($categories as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->title}}</td>
                    <td>{{$item->description}}</td>
                    <td><a href="{{ route('admin.categories.edit', ['category' => $item->id]) }}">Edit</a>&nbsp;|&nbsp;
                        <form action="{{route('admin.categories.destroy', $item)}}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="color:red; border:none; background:none; padding:0; margin:0; cursor: pointer;">Del</button>
                        </form>
                    </td>
                </tr>
        @endforeach
        </table>
    </div>
    <div class="btn-group me-2">
        <a href="{{route('admin.categories.create')}}" class="btn btn-primary" style="float:right;">add category</a>
    </div>
@endsection

