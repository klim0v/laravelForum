@extends('layouts.app')

@section('title', 'Edit A Message')

@section('content')
    <div class="container">
        <h1>Edit A Message</h1><br/>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br/>
        @endif
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div><br/>
        @endif
        <form method="post" action="{{route('admin.messages.update', ['id' => $message->id])}}">
            {{csrf_field()}}
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="text">Title:</label>
                    <input id="text" type="text" class="form-control" name="text" value="{{$message->text}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="topic_id">Topic:</label>
                    <select id="topic_id" name="topic_id" class="form-control">
                        @foreach ($topics as $topic)
                            <option value="{{ $topic->id }}">{{ $topic->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <button type="submit" class="btn btn-success" style="margin-left:38px">Update Message</button>
                </div>
            </div>
        </form>
    </div>
@endsection
