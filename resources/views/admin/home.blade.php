@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="jumbotron text-center">
                    <a href="{{ route('admin.categories.index') }}" class="label label-primary">
                        Categories
                    </a>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="jumbotron text-center">
                    <a href="{{ route('admin.topics.index') }}" class="label label-primary">
                        Topics
                    </a>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="jumbotron text-center">
                    <a href="{{ route('admin.messages.index') }}" class="label label-primary">
                        Messages
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
