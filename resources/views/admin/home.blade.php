@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are logged in!

                    </div>

                    <a href="{{ route('admin.categories.index') }}">Categories</a>
                    <a href="{{ route('admin.topics.index') }}">Topics</a>
                    <a href="{{ route('admin.messages.index') }}">Messages</a>

                </div>
            </div>
        </div>
    </div>
@endsection
