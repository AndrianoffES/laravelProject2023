@extends('layouts.admin')
@section('content')
    <h1 >Categories</h1>
    @if($errors->any())
        @foreach($errors->all() as $error)
            <x-alert type="danger" :message="$error" ></x-alert>
        @endforeach
    @endif
    @include('messages')
    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th>#ID</th>
                <th>Title</th>
                <th>Actions</th>
            </tr>
            @foreach($links as $link)
                <tr>
                    <td>{{$link->id}}</td>
                    <td>{{$link->link}}</td>

                    <td>
                        <a href="{{route('admin.resources.edit', ['resource'=>$link->id])}}">Edit</a>&nbsp;|&nbsp;
                        <a href="javascript:;" class="delete" rel="{{ $link->id }}" style="color: red;">Delete.</a>
                    </td>
                </tr>
            @endforeach
        </table>
        {{$links->links()}}
    </div>
    <div class="btn-group me-2">
        <a href="{{route('admin.resources.create')}}" class="btn btn-primary" style="float:right;">add resource link</a>
    </div>
@endsection

@push('js')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            let elements = document.querySelectorAll(".delete");
            elements.forEach(function(e, k) {
                e.addEventListener("click", function() {
                    const id = this.getAttribute('rel');
                    if(confirm(`Are you sure?`)) {
                        send(`/admin/resources/${id}`).then(() => {
                            location.reload();
                        });
                    } else {
                        alert("Deleting was canceled");
                    }
                });
            });
        });
        async function send(url) {
            let response = await fetch(url, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });
            let result = await response.json();
            return result.ok;
        }
    </script>
@endpush
