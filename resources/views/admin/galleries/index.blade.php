@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.gallery.title')</h3>
    
    <p>
        {{ trans('global.app_custom_controller_index') }} 
    </p>

    <iframe src="/laravel-filemanager?defaultPath=clips" style="width: 100%; height: 500px; overflow: hidden; border: none;"></iframe>



@stop