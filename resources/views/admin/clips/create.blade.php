@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.clips.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.clips.store'], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 col-md-3 col-lg-3 form-group">
                    {!! Form::label('industry_id', trans('global.clips.fields.industry').'', ['class' => 'control-label']) !!}
                    {!! Form::select('industry_id', $industries, old('industry_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('industry_id'))
                        <p class="help-block">
                            {{ $errors->first('industry_id') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-12 col-md-3 col-lg-3 form-group">
                    {!! Form::label('brand_id', trans('global.clips.fields.brand').'', ['class' => 'control-label']) !!}
                    {!! Form::select('brand_id', $brands, old('brand_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('brand_id'))
                        <p class="help-block">
                            {{ $errors->first('brand_id') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-12 col-md-3 col-lg-3 form-group">
                    {!! Form::label('products_id', trans('global.clips.fields.products').'', ['class' => 'control-label']) !!}
                    {!! Form::select('products_id', $products, old('products_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('products_id'))
                        <p class="help-block">
                            {{ $errors->first('products_id') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-12 col-md-3 col-lg-3  form-group">
                    {!! Form::label('states', trans('global.clips.fields.states').'', ['class' => 'control-label']) !!}
                    <button type="button" class="btn btn-primary btn-xs" id="selectbtn-states">
                        {{ trans('global.app_select_all') }}
                    </button>
                    <button type="button" class="btn btn-primary btn-xs" id="deselectbtn-states">
                        {{ trans('global.app_deselect_all') }}
                    </button>
                    {!! Form::select('states[]', $states, old('states'), ['class' => 'form-control select2', 'multiple' => 'multiple', 'id' => 'selectall-states' ]) !!}
                    <p class="help-block"></p>
                    @if($errors->has('states'))
                        <p class="help-block">
                            {{ $errors->first('states') }}
                        </p>
                    @endif
                </div>
            </div>
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
                    {!! Form::select('images[]', $images, old('images'), ['class' => 'form-control select2', 'multiple' => 'multiple', 'id' => 'selectall-images' ]) !!}
                    <p class="help-block"></p>
                    @if($errors->has('images'))
                        <p class="help-block">
                            {{ $errors->first('images') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger']) !!}
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

    <script>
        $("#selectbtn-states").click(function(){
            $("#selectall-states > option").prop("selected","selected");
            $("#selectall-states").trigger("change");
        });
        $("#deselectbtn-states").click(function(){
            $("#selectall-states > option").prop("selected","");
            $("#selectall-states").trigger("change");
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