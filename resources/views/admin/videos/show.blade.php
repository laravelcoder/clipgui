@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.videos.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.videos.fields.title')</th>
                            <td field-key='title'>{{ $video->title }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.videos.fields.original-name')</th>
                            <td field-key='original_name'>{{ $video->original_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.videos.fields.disk')</th>
                            <td field-key='disk'>{{ $video->disk }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.videos.fields.path')</th>
                            <td field-key='path'>{{ $video->path }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.videos.fields.description')</th>
                            <td field-key='description'>{!! $video->description !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.videos.fields.clip-upload')</th>
                            <td field-key='clip_upload'>@if($video->clip_upload)<a href="{{ asset(env('UPLOAD_PATH').'/' . $video->clip_upload) }}" target="_blank">Download file</a>@endif</td>
                        </tr>
                        <tr>
                            <th>@lang('global.videos.fields.industry')</th>
                            <td field-key='industry'>{{ $video->industry->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.videos.fields.brand')</th>
                            <td field-key='brand'>{{ $video->brand->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.videos.fields.states')</th>
                            <td field-key='states'>{{ $video->states->state or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.videos.fields.products')</th>
                            <td field-key='products'>{{ $video->products->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.videos.fields.notes')</th>
                            <td field-key='notes'>{!! $video->notes !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.videos.fields.images')</th>
                            <td field-key='images'>
                                @foreach ($video->images as $singleImages)
                                    <span class="label label-info label-many">{{ $singleImages->image }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>@lang('global.videos.fields.converted-for-downloading-at')</th>
                            <td field-key='converted_for_downloading_at'>{{ $video->converted_for_downloading_at }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.videos.fields.converted-for-streaming-at')</th>
                            <td field-key='converted_for_streaming_at'>{{ $video->converted_for_streaming_at }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.videos.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop

@section('javascript')
    @parent
    <script src="//cdn.ckeditor.com/4.5.4/full/ckeditor.js"></script>
    <script>
        $('.editor').each(function () {
                  CKEDITOR.replace($(this).attr('id'),{
                    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
                    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
            });
        });
    </script>

    <script src="{{ url('adminlte/plugins/datetimepicker/moment-with-locales.min.js') }}"></script>
    <script src="{{ url('adminlte/plugins/datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
    <script>
        $(function(){
            moment.updateLocale('{{ App::getLocale() }}', {
                week: { dow: 1 } // Monday is the first day of the week
            });
            
            $('.datetime').datetimepicker({
                format: "{{ config('app.datetime_format_moment') }}",
                locale: "{{ App::getLocale() }}",
                sideBySide: true,
            });
            
        });
    </script>
            
@stop
