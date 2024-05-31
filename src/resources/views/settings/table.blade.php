<table class="table">
    @foreach(settings()->all($fresh = false) as $key => $setting)
        <tr>
            <th>{{$key}}</th>
            <td>
                @if($key == 'site left logo')
                    <img src="{{url('storage/'.$setting)}}" class="image-thumbnail" style="height:150px;">
                    <input type="file" name="val[]" value="{{$setting}}" class="form-control">
                @else
                    <input type="text" name="val[]" value="{{$setting}}" class="form-control">
                @endif
                <input type="hidden" name="name[]" value="{{$key}}" class="form-control">
            </td>
        </tr>
    @endforeach
</table>