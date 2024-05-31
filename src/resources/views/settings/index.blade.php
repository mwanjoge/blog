@extends('layouts.app')
@section('content')
    @include('blog::settings.setting_create_modal')
    <div class="row">
        <div class="col">
            <h1>Settings
                <a href="javascript:void(0)" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#setting-create-modal"> + Create new settings</a>
            </h1>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">system Settings</div>
                        @include('blog::settings.table')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection