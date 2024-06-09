<div class="row">
    <div class="mb-3">
        <label>Parent Category</label>
        <select name="category_id" class="form-control">
            <option value="{{null}}">Choose parent category</option>
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Category Name</label>
        <input type="text" name="name" class="form-control" value="" required>
    </div>
    <div class="mb-3">
        <label>Category Language</label>
        <select name="lang" class="form-control">
            <option value="en">English</option>
            <option value="sw">Kiswahili</option>
        </select>
    </div>
    <div class="mb-3">
        <label>Is Active</label>
        <input type="checkbox" name="active" class="" value="1" checked>
    </div>
    <div class="mb-3">
        <input type="submit" class="btn btn-primary" value="Submit">
    </div>
</div>