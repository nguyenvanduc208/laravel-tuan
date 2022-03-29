{{-- Home se ke thua view master --}}
@extends('layout.master')

{{-- section se thay doi
    phan yield trong master
    voi ten tuong ung --}}
@section('title', 'Category page')

@section('content-title', 'Category page')

@section('content')
    <table class="table table-hover">
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Slug</th>
            <th>Status</th>
            <th>Created at</th>
            <th>Updated at</th>
            <th><a href="{{ route('cate-create') }}"><button class="btn btn-primary">Add new</button></a></th>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description ?: 'N/A' }}</td>
                        <td>{{ $category->slug ?: 'N/A' }}</td>
                        <td>{{ $category->status == 1 ? 'Active' : 'Deactive' }}</td>
                        <td>{{ $category->created_at ?: 'N/A' }}</td>
                        <td>{{ $category->updated_at ?: 'N/A' }}</td>
                        <td>
                            <a href="{{ route('cate-edit' , $category->id) }}"><button type="button" class="btn btn-info">Edit</button></a>
                            <a href="{{ route('cate-delete', $category->id) }}"><button type="button" onclick="return confirm('Delete ?')"class="btn btn-danger">Delete</button></a>
                        </td>
                    </tr>
            @endforeach
        </tbody>
    </table>
    {{ $categories->links() }}
    @if ( session('status') == 'delete')
    <script>
        alert('Delete successfully !');
    </script>
    @endif
    
@endsection
