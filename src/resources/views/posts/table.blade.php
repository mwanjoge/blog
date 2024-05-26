<div class="table-responsive">
    <table class="table">
        <thead>
        <tr class="th">
            <th>#</th>
            <th>Title</th>
            <th>Slug</th>
            <th>Category</th>
            <th>Lang</th>
            <th>Published</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->slug}}</td>
                <td>{{$post->category?->name}}</td>
                <td>{{$post->lang.' '.session()->get('locale')}}</td>
                <td>{{$post->published ? $post->published_at->format('d M Y') :'Not Published'}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>