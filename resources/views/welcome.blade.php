@extends('layouts.app')

@section('content')
    <div class="container">
        @if ( count($categories))
            <div class="row">
                @foreach($categories as $category)
                    <div class="col-sm-6">
                        <span class="btn btn-block btn-default">Category: {{ $category->name }}</span>
                        @foreach($category->topics as $topic)
                            <span class="list-group-item">
                            <h4 class="list-group-item-heading">Topic: {{$topic->title}}</h4>
                                @foreach($topic->messages as $message)
                                    <p class="list-group-item-text">Message: {{ $message->text }}</p>
                                @endforeach
                                <br>
                                <form action="{{ route('admin.messages.store') }}" method="post">
                                    {{csrf_field()}}
                                    <input type="text" class="form-control" name="text">
                                    <input type="number" name="topic_id"
                                           value="{{ $topic->id }}" style="display: none">
                                    <button type="submit" class="btn btn-success">Add Message</button>
                                </form>
                            </span>
                            <br>
                        @endforeach
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection

