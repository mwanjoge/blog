<div>
    <form action="{{route('posts.store')}}" method="post">
        <div class="row">
            <div class="col-8">
                @csrf
                <div class="mb-3">
                    <label>Category</label>
                    <select class="form-control" name="category_id" required>
                        <option value="{{null}}">Choose parent category</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" required>
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
                    <input type="date" name="published_at" class="form-control" required>
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
</div>