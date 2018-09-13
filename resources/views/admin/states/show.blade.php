@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.states.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.states.fields.state')</th>
                            <td field-key='state'>{{ $state->state }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.states.fields.slug')</th>
                            <td field-key='slug'>{{ $state->slug }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#videos" aria-controls="videos" role="tab" data-toggle="tab">Videos</a></li>
<li role="presentation" class=""><a href="#clips" aria-controls="clips" role="tab" data-toggle="tab">Clips</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="videos">
<table class="table table-bordered table-striped {{ count($videos) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.videos.fields.title')</th>
                        <th>@lang('global.videos.fields.path')</th>
                        <th>@lang('global.videos.fields.clip-upload')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($videos) > 0)
            @foreach ($videos as $video)
                <tr data-entry-id="{{ $video->id }}">
                    <td field-key='title'>{{ $video->title }}</td>
                                <td field-key='path'>{{ $video->path }}</td>
                                <td field-key='clip_upload'>@if($video->clip_upload)<a href="{{ asset(env('UPLOAD_PATH').'/' . $video->clip_upload) }}" target="_blank">Download file</a>@endif</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.videos.restore', $video->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.videos.perma_del', $video->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('video_view')
                                    <a href="{{ route('admin.videos.show',[$video->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('video_edit')
                                    <a href="{{ route('admin.videos.edit',[$video->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('video_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.videos.destroy', $video->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="19">@lang('global.app_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="clips">
<table class="table table-bordered table-striped {{ count($clips) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.clips.fields.title')</th>
                        <th>@lang('global.clips.fields.path')</th>
                        <th>@lang('global.clips.fields.label')</th>
                        <th>@lang('global.clips.fields.clip-upload')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($clips) > 0)
            @foreach ($clips as $clip)
                <tr data-entry-id="{{ $clip->id }}">
                    <td field-key='title'>{{ $clip->title }}</td>
                                <td field-key='path'>{{ $clip->path }}</td>
                                <td field-key='label'>{{ $clip->label }}</td>
                                <td field-key='clip_upload'>@if($clip->clip_upload)<a href="{{ asset(env('UPLOAD_PATH').'/' . $clip->clip_upload) }}" target="_blank">Download file</a>@endif</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.clips.restore', $clip->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.clips.perma_del', $clip->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('clip_view')
                                    <a href="{{ route('admin.clips.show',[$clip->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('clip_edit')
                                    <a href="{{ route('admin.clips.edit',[$clip->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('clip_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.clips.destroy', $clip->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="20">@lang('global.app_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.states.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop


