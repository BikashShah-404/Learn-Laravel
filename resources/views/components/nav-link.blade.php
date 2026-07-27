@props(['active'=>false,'type'=>'button'])

<?php if($type==="link"): ?>
    <a class="{{$active ? 'bg-blue-800 p-2 rounded-2xl text-white' :'p-2'}}" {{$attributes}}>{{$slot}}</a> 
<?php else : ?>
    <button class="{{$active ? 'bg-blue-800 p-2 rounded-2xl text-white' :'p-2'}}" {{$attributes}}>{{$slot}}</button>
<?php endif ?>