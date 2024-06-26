@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col">
            <h1>Posts
                <a href="{{route('posts.create')}}" class="btn btn-primary float-end"> + Create new post</a>
            </h1>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">Posts List</div>
                        @include('blog::posts.table')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection