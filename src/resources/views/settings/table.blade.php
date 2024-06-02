<table class="table table-sm mb-0">
    @foreach(settings()->all() as $key => $setting)
        <tr>
            <th class="text-capitalize">{{$key}}</th>
            <form action="{{route('settings.store')}}" method="post" enctype="multipart/form-data">
            <td>
                @csrf
                @if($key == 'left site logo' || $key == 'right site logo' || $key == 'minimal site logo')
                    <div class="row">
                        <div class="col-2">
                            <img src="{{url('storage/'.$setting)}}" class="image-thumbnail" style="height:50px;">
                        </div>
                        <div class="col">
                            <input type="file" name="val"  class="form-control">
                        </div>
                    </div>

                    <input type="hidden" name="name" value="{{$key}}" class="form-control">
                    <input type="hidden" name="val" value="{{$setting}}" class="form-control">
                @else
                    <input type="text" name="val" value="{{$setting}}" class="form-control">
                    <input type="hidden" name="name" value="{{$key}}" class="form-control">
                @endif

            </td>
                <td><button type="submit" class="btn btn-primary">Save</button></td>
            </form>
        </tr>
    @endforeach
</table>