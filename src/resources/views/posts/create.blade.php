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
                    <textarea id="tinymce-mytextarea" name="body"></textarea>
                    <div id="body" name="body">
                        <p>Hello World!</p>
                        <p>Some initial <strong>bold</strong> text</p>
                        <p><br /></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <input id="n" type="checkbox" name="published" value="1"> Publish Now<br>
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
            // let options = {
            //     selector: '#tinymce-mytextarea',
            //     height: 300,
            //     menubar: false,
            //     statusbar: false,
            //     plugins: [
            //         'advlist autolink lists link image charmap print preview anchor',
            //         'searchreplace visualblocks code fullscreen',
            //         'insertdatetime media table paste code help wordcount'
            //     ],
            //     toolbar: 'undo redo | formatselect | ' +
            //         'bold italic backcolor | alignleft aligncenter ' +
            //         'alignright alignjustify | bullist numlist outdent indent | ' +
            //         'removeformat',
            //     content_style: 'body { font-family: -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif; font-size: 14px; -webkit-font-smoothing: antialiased; }'
            // }
            // if (localStorage.getItem("tablerTheme") === 'dark') {
            //     options.skin = 'oxide-dark';
            //     options.content_css = 'dark';
            // }
            // let otherOption = {
            //         selector: 'textarea',
            //         plugins: 'anchor autolink charmap codesample emoticons image imageupload link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage advtemplate ai mentions tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss markdown',
            //         toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            //         tinycomments_mode: 'embedded',
            //         tinycomments_author: 'Author name',
            //         mergetags_list: [
            //             { value: 'First.Name', title: 'First Name' },
            //             { value: 'Email', title: 'Email' },
            //         ],
            //         ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
            //
            // }
            // tinymce.init(otherOption);
        })
        let quill = new Quill('#body', {
            theme: 'snow'
        });

        $('#submit-post').hover(function (){
            $('#tinymce-mytextarea').val(quill.getSemanticHTML(0, quill.getLength()));
        });

    </script>
@endsection