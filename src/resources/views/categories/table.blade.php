<div class="table-responsive">
    <table class="table">
        <thead>
            <tr class="th">
                <th>#</th>
                <th>Name</th>
                <th>Parent Category</th>
                <th>Code</th>
                <th>Lang</th>
                <th>Is Active</th>
            </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$category->name}}</td>
                <td>{{$category->category?->name}}</td>
                <td>{{$category->code}}</td>
                <td>{{$category->lang}}</td>
                <td>{{$category->active ? 'Active':'Not Active'}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>