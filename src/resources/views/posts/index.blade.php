@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col">
            <h1>Posts</h1>
            <div class="row mb-3">
                <div class="col">
                    @include('blog::menu')
                </div>
                <div class="col text-end">
                    <a href="{{route('posts.create')}}" class="btn btn-primary"> + Create new post</a>
                </div>
            </div>

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