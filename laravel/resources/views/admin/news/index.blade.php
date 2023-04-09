@extends('layouts.admin')
@section('content')
    <h1 class="h2">News</h1>
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
                <th>Category</th>
                <th>Status</th>
                <th>Description</th>
                <th>Author</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
            @php //dump($news) @endphp
            @foreach($news as $newsItem)
                <tr>
                    <td>{{$newsItem->id}}</td>
                    <td>{{$newsItem->category->pluck('title')->implode(', ')}}</td>
                    <td>{{$newsItem->status}}</td>
                    <td>{{$newsItem->title}}</td>
                    <td>{{$newsItem->author}}</td>
                    <td>{{$newsItem->created_at}}</td>
                    <td>
                        <a href="{{route('admin.news.edit', ['news'=>$newsItem])}}">Edit</a>&nbsp;|&nbsp;
                        <a href="javascript:;" class="delete" rel="{{ $newsItem->id }}" style="color: red;">Del.</a>

                    </td>
                </tr>
            @endforeach

        </table>
        {{$news->links()}}
    </div>
    <div class="btn-group me-2">
        <a href="{{route('admin.news.create')}}" class="btn btn-primary">add news</a>
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
                        send(`/admin/news/${id}`).then(() => {
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
