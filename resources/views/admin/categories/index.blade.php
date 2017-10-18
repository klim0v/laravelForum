@extends('layouts.app')

@section('title', 'All Categories')

@section('content')
    <div class="container">
        <h1>All Category</h1><br/>
        <a href="{{route('admin.categories.create')}}" class="btn btn-primary">Create A Category</a>
        <br/>
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div><br/>
        @endif
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th colspan="2">Action</th>
                <th>Topics</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td><a href="{{ route('admin.categories.edit', ['id' => $category->id])}}"
                           class="btn btn-warning">Edit</a></td>
                    <td>
                        <form action="{{route('admin.categories.destroy', $category->id)}}" method="post">
                            {{csrf_field()}}
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('admin.topics.index', ['category_id' => $category->id]) }}">{{ count($category->topics) }}</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
