    <option value="0" disabled selected>{{__('lang.SubCategory')}}</option>
@foreach($data as $city)
    <option value="{{$city->id}}">{{$city->title}}</option>
@endforeach
