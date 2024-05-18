@props([
   'name'
])




@if(auth('admin')->user()->hasPermission($name))
   {{ $slot }}
@endif
