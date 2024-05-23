@extends('layouts.app')
@section('content')
    <h1>Categories</h1>
    <div class="row mb-3">
        <div class="col">
            @include('blog::menu')
        </div>
    </div>
    <div class="row">
        <div class="col-7">
            <div class="card">
                <div class="card-header">
                    Categories
                </div>
                @include('blog::categories.table')
            </div>
        </div>
        <div class="col">
            <form action="{{route('categories.store')}}" method="post">
                @csrf
                @include('blog::categories.fields')
            </form>
        </div>
    </div>
@endsection