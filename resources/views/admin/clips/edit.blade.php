@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.clips.title')</h3>
    
    {!! Form::model($clip, ['method' => 'PUT', 'route' => ['admin.clips.update', $clip->id], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('title', trans('global.clips.fields.title').'', ['class' => 'control-label']) !!}
                    {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('title'))
                        <p class="help-block">
                            {{ $errors->first('title') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('original_name', trans('global.clips.fields.original-name').'', ['class' => 'control-label']) !!}
                    {!! Form::text('original_name', old('original_name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('original_name'))
                        <p class="help-block">
                            {{ $errors->first('original_name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('disk', trans('global.clips.fields.disk').'', ['class' => 'control-label']) !!}
                    {!! Form::text('disk', old('disk'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('disk'))
                        <p class="help-block">
                            {{ $errors->first('disk') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('path', trans('global.clips.fields.path').'', ['class' => 'control-label']) !!}
                    {!! Form::text('path', old('path'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('path'))
                        <p class="help-block">
                            {{ $errors->first('path') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('label', trans('global.clips.fields.label').'', ['class' => 'control-label']) !!}
                    {!! Form::text('label', old('label'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('label'))
                        <p class="help-block">
                            {{ $errors->first('label') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('description', trans('global.clips.fields.description').'', ['class' => 'control-label']) !!}
                    {!! Form::textarea('description', old('description'), ['class' => 'form-control editor', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('description'))
                        <p class="help-block">
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('clip_upload', trans('global.clips.fields.clip-upload').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('clip_upload', old('clip_upload')) !!}
                    @if ($clip->clip_upload)
                        <a href="{{ asset(env('UPLOAD_PATH').'/' . $clip->clip_upload) }}" target="_blank">Download file</a>
                    @endif
                    {!! Form::file('clip_upload', ['class' => 'form-control']) !!}
                    {!! Form::hidden('clip_upload_max_size', 50) !!}
                    <p class="help-block"></p>
                    @if($errors->has('clip_upload'))
                        <p class="help-block">
                            {{ $errors->first('clip_upload') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('industry_id', trans('global.clips.fields.industry').'', ['class' => 'control-label']) !!}
                    {!! Form::select('industry_id', $industries, old('industry_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('industry_id'))
                        <p class="help-block">
                            {{ $errors->first('industry_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('brand_id', trans('global.clips.fields.brand').'', ['class' => 'control-label']) !!}
                    {!! Form::select('brand_id', $brands, old('brand_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('brand_id'))
                        <p class="help-block">
                            {{ $errors->first('brand_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('states_id', trans('global.clips.fields.states').'', ['class' => 'control-label']) !!}
                    {!! Form::select('states_id', $states, old('states_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('states_id'))
                        <p class="help-block">
                            {{ $errors->first('states_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('products_id', trans('global.clips.fields.products').'', ['class' => 'control-label']) !!}
                    {!! Form::select('products_id', $products, old('products_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('products_id'))
                        <p class="help-block">
                            {{ $errors->first('products_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('notes', trans('global.clips.fields.notes').'', ['class' => 'control-label']) !!}
                    {!! Form::textarea('notes', old('notes'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('notes'))
                        <p class="help-block">
                            {{ $errors->first('notes') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('images', trans('global.clips.fields.images').'', ['class' => 'control-label']) !!}
                    <button type="button" class="btn btn-primary btn-xs" id="selectbtn-images">
                        {{ trans('global.app_select_all') }}
                    </button>
                    <button type="button" class="btn btn-primary btn-xs" id="deselectbtn-images">
                        {{ trans('global.app_deselect_all') }}
                    </button>
                    {!! Form::select('images[]', $images, old('images') ? old('images') : $clip->images->pluck('id')->toArray(), ['class' => 'form-control select2', 'multiple' => 'multiple', 'id' => 'selectall-images' ]) !!}
                    <p class="help-block"></p>
                    @if($errors->has('images'))
                        <p class="help-block">
                            {{ $errors->first('images') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('converted_for_downloading_at', trans('global.clips.fields.converted-for-downloading-at').'', ['class' => 'control-label']) !!}
                    {!! Form::text('converted_for_downloading_at', old('converted_for_downloading_at'), ['class' => 'form-control datetime', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('converted_for_downloading_at'))
                        <p class="help-block">
                            {{ $errors->first('converted_for_downloading_at') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('converted_for_streaming_at', trans('global.clips.fields.converted-for-streaming-at').'', ['class' => 'control-label']) !!}
                    {!! Form::text('converted_for_streaming_at', old('converted_for_streaming_at'), ['class' => 'form-control datetime', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('converted_for_streaming_at'))
                        <p class="help-block">
                            {{ $errors->first('converted_for_streaming_at') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
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
            
    <script>
        $("#selectbtn-images").click(function(){
            $("#selectall-images > option").prop("selected","selected");
            $("#selectall-images").trigger("change");
        });
        $("#deselectbtn-images").click(function(){
            $("#selectall-images > option").prop("selected","");
            $("#selectall-images").trigger("change");
        });
    </script>
@stop