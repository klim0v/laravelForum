@extends('layouts.app')

@section('title', 'All Messages')

@section('content')
    <div class="container">
        <h1>All Messages</h1>
        <a href="{{route('admin.messages.create')}}" class="btn btn-primary">Create A Message</a>
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
                <th>Text</th>
                <th>Topic</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($messages as $message)
                <tr>
                    <td>{{$message->id}}</td>
                    <td>{{$message->text}}</td>
                    <td>
                        <a href="{{route('admin.topics.index')}}">
                            {{$message->topic->title}}
                        </a>
                    </td>
                    <td>
                        <a href="{{route('admin.messages.update', [ 'id' => $message->id])}}" class="btn btn-warning">Edit</a>
                    </td>
                    <td>
                        <form action="{{route('admin.messages.destroy', [ 'id' => $message->id])}}" method="post">
                            {{csrf_field()}}
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                    <td></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
