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
                <th>Description</th>
            </tr>
            @foreach($categories as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->title}}</td>
                    <td>{{$item->description}}</td>
                    <td>
                        <a href="{{ route('admin.categories.edit', ['category' => $item->id]) }}">Edit</a>&nbsp;|&nbsp;
                        <a href="javascript:;" class="delete" rel="{{ $item->id }}" style="color: red;">Del.</a>
                    </td>
                </tr>
        @endforeach
        </table>
    </div>
    <div class="btn-group me-2">
        <a href="{{route('admin.categories.create')}}" class="btn btn-primary" style="float:right;">add category</a>
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
                        send(`/admin/categories/${id}`).then(() => {
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
