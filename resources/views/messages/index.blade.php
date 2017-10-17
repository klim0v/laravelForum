@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{route('message_create')}}" class="btn btn-primary">Create A Message</a>
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
                <th colspan="2">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($messages as $message)
                <tr>
                    <td>{{$message->id}}</td>
                    <td>{{$message->text}}</td>
                    <td>
                        <a href="{{route('topic_list')}}">
                            {{$message->topic->title}}
                        </a>
                    </td>
                    <td>
                        <a href="{{route('message_update', [ 'id' => $message->id])}}" class="btn btn-warning">Edit</a>
                    </td>
                    <td>
                        <form action="{{route('message_delete', [ 'id' => $message->id])}}" method="post">
                            {{csrf_field()}}
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
