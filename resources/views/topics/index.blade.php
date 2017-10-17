@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{route('topic_create')}}" class="btn btn-primary">Create A Topic</a>
        <br />
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div><br />
        @endif
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th colspan="2">Action</th>
                <th>Messages</th>
            </tr>
            </thead>
            <tbody>
            @foreach($topics as $topic)
                <tr>
                    <td>{{$topic->id}}</td>
                    <td>{{$topic->title}}</td>
                    <td>
                        <a href="{{route('topic_update', [ 'id' => $topic->id])}}" class="btn btn-warning">Edit</a>
                    </td>
                    <td>
                        <form action="{{route('topic_delete', [ 'id' => $topic->id])}}" method="post">
                            {{csrf_field()}}
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('message_list', ['topic_id' => $topic->id]) }}">
                            {{ count($topic->messages) }}
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
