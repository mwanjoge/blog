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
    <form action="{{route('posts.update',$post->id)}}" method="post">
        @method('put')
        <div class="row">
            <div class="col-8">
                @csrf
                <div class="mb-3">
                    <label>Category</label>
                    <select class="form-control" name="category_id">
                        <option value="{{$post->category_id}}">{{$post->category->name}}</option>
                        @foreach($categories as $category)
                            @if($category->id !== $post->category_id)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" value="{{$post->title}}">
                </div>
                <div class="mb-3">
                    <textarea style="display:none;" id="tinymce-mytextarea" name="body"></textarea>

                    <div id="body">
                        {!! $post->body !!}
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <input type="checkbox" name="published" value="1" {{$post->published ? 'checked':''}}> Publish Now<br>
                </div>
                <div class="mb-3">
                    <label>Publish At</label>
                    <input type="text" id="datepicker-default" name="published_at" class="form-control" value="{{$post->published_at}}">
                    <div class="input-icon mb-2">
                        <input class="form-control " placeholder="Select a date" id="datepicker-icon" value="{{$post->published_at}}"/>
                        <span class="input-icon-addon"><!-- Download SVG icon from http://tabler-icons.io/i/calendar -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" /><path d="M16 3v4" /><path d="M8 3v4" /><path d="M4 11h16" /><path d="M11 15h1" /><path d="M12 15v3" /></svg>
                        </span>
                    </div>
                </div>
                <div class="mb-3">
                    <label>Featured Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="mb-3 text-end">
                    <input id="submit-post" type="submit" class="btn btn-primary" value="Submit">
                </div>
            </div>
        </div>
    </form>
@endsection
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
    <script>
        // @formatter:off
        document.addEventListener("DOMContentLoaded", function () {
            window.Litepicker && (new Litepicker({
                element: document.getElementById('datepicker-default'),
                buttonText: {
                    previousMonth: `<!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" /></svg>`,
                    nextMonth: `<!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>`,
                },
            }));
        })
        let quill = new Quill('#body', {
            theme: 'snow',
        });

        $('#submit-post').hover(function (){
            $('#tinymce-mytextarea').val(quill.getSemanticHTML(0, quill.getLength()));
        });
        document.addEventListener("DOMContentLoaded", function () {
            window.Litepicker && (new Litepicker({
                element: document.getElementById('datepicker-icon'),
                buttonText: {
                    previousMonth: `<!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" /></svg>`,
                    nextMonth: `<!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>`,
                },
            }));
        });
    </script>
@endsection