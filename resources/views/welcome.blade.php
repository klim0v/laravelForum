@extends('layouts.app')

@section('content')
    <div class="container">
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div><br/>
        @endif
        @if ( count($categories))
            <div class="row">
                @foreach($categories as $category)
                    <div class="col-sm-6">
                        <span class="btn btn-block btn-default">
                            Category: {{ $category->name }}.
                            @if ( $category->created_at < $category->updated_at )
                                edited {{ $category->updated_at }}
                            @else
                                created {{ $category->created_at }}
                            @endif
                        </span>
                        @if ( count($category->topics))
                            @foreach($category->topics as $topic)
                                <span class="list-group-item">
                                <h4 class="list-group-item-heading">Topic: {{$topic->title}}</h4>
                                <strong>
                                    @if ( $topic->created_at < $topic->updated_at )
                                        edited {{ $topic->updated_at }}
                                    @else
                                        created {{ $topic->created_at }}
                                    @endif
                                </strong>
                                    @if ( count($topic->messages))
                                        @foreach($topic->messages as $message)
                                            <p class="list-group-item-text">Message: {{ $message->text }}
                                                <i>{{ $topic->created_at->format('H:i:s')}}</i>
                                            </p>
                                        @endforeach
                                    @else
                                        <p class="list-group-item-text">Null messages</p>
                                    @endif
                                    <br>
                                    <form action="{{ route('public.messages.store') }}" method="post">
                                        {{csrf_field()}}
                                        <input type="text" class="form-control" name="text">
                                        <input type="number" name="topic_id"
                                               value="{{ $topic->id }}" style="display: none">
                                        <button type="submit" class="btn btn-success">Add Message</button>
                                    </form>
                                </span>
                                <br>
                            @endforeach
                        @else
                            <span class="list-group-item">
                                <h4 class="list-group-item-heading">Null topics</h4>
                            </span>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection

