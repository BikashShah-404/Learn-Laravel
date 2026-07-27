@props(['active'=>false])

<a class="{{$active ? 'bg-blue-800 p-2 rounded-2xl text-white' :'p-2'}}" {{$attributes}}>{{$slot}}</a> 