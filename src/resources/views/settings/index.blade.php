@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col">
            <h1>Settings
                <a href="{{route('posts.create')}}" class="btn btn-primary float-end"> + Create new post</a>
            </h1>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">system Settings</div>
                        <form action="{{route('settings.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @include('blog::settings.table')
                            <div class="card-footer text-end">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection