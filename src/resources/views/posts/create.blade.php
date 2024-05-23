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
        </div>
    </div>
    <form action="{{route('posts.store')}}" method="post">
        <div class="row">
            <div class="col-8">
                @csrf
                <div class="mb-3">
                    <label>Category</label>
                    <select class="form-control" name="category_id">
                        <option value="{{null}}">Choose parent category</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="mb-3">
                    <textarea id="tinymce-mytextarea">Hello, <b>Tabler</b>!</textarea>
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <input type="checkbox" name="published" value="1"> Publish Now<br>
                </div>
                <div class="mb-3">
                    <label>Publish At</label>
                    <input type="date" name="published_at" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Featured Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="mb-3 text-end">
                    <input type="submit" class="btn btn-primary" value="Submit">
                </div>
            </div>
        </div>
    </form>
@endsection
@section('scripts')
    <script>
        // @formatter:off
        document.addEventListener("DOMContentLoaded", function () {
            let options = {
                selector: '#tinymce-mytextarea',
                height: 300,
                menubar: false,
                statusbar: false,
                plugins: [
                    'advlist autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table paste code help wordcount'
                ],
                toolbar: 'undo redo | formatselect | ' +
                    'bold italic backcolor | alignleft aligncenter ' +
                    'alignright alignjustify | bullist numlist outdent indent | ' +
                    'removeformat',
                content_style: 'body { font-family: -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif; font-size: 14px; -webkit-font-smoothing: antialiased; }'
            }
            if (localStorage.getItem("tablerTheme") === 'dark') {
                options.skin = 'oxide-dark';
                options.content_css = 'dark';
            }
            tinymce.init(options);
        })
        // @formatter:on
    </script>
@endsection