@foreach($data as $city)
    <option value="{{$city->id}}">{{$city->title}}</option>
@endforeach
