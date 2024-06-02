<div class="table-responsive">
    <table class="table">
        <thead>
        <tr class="th">
            <th>#</th>
            <th>Image</th>
            <th>Title</th>
            <th>Slug</th>
            <th>Category</th>
            <th>Lang</th>
            <th>Published</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>
                    @if(substr($upload->getMimeType(), 0, 5) == 'image')
                        <img src="{{url('storage/'.$post->image)}}" style="height: 50px;">
                    @else
                        <img src="{{asset('img/pdf.png')}}" style="height: 50px;">
                    @endif
                </td>
                <td>{{$post->title}}</td>
                <td>{{$post->slug}}</td>
                <td>{{$post->category?->name}}</td>
                <td>{{$post->lang}}</td>
                <td>{{$post->published ? $post->published_at->format('d M Y') :'Not Published'}}</td>
                <td>
                    <a href="{{route('posts.edit',$post->id)}}">
                        Edit
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>