@extends('layouts.admin')
@section('content')
    <h1 class="h2">Users</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        @if($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message="$error" ></x-alert>
            @endforeach
        @endif
        @include('messages')
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th>#ID</th>
                <th>Name</th>
                <th>email</th>
                <th>is_admin</th>
            </tr>
            @php //dump($news) @endphp
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    @if($user->is_admin==0) <td>false </td>
                    @else<td>true</td>@endif

                    <td>
                        <a href="{{route('admin.users.edit', ['user'=>$user])}}">Edit</a>&nbsp;|&nbsp;
                        <a style="color: red;">Del.</a>

                    </td>
                </tr>
            @endforeach

        </table>

    </div>

@endsection


