@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.brands.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.brands.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', trans('global.brands.fields.name').'', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('slug', trans('global.brands.fields.slug').'', ['class' => 'control-label']) !!}
                    {!! Form::text('slug', old('slug'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('slug'))
                        <p class="help-block">
                            {{ $errors->first('slug') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('clips', trans('global.brands.fields.clips').'', ['class' => 'control-label']) !!}
                    <button type="button" class="btn btn-primary btn-xs" id="selectbtn-clips">
                        {{ trans('global.app_select_all') }}
                    </button>
                    <button type="button" class="btn btn-primary btn-xs" id="deselectbtn-clips">
                        {{ trans('global.app_deselect_all') }}
                    </button>
                    {!! Form::select('clips[]', $clips, old('clips'), ['class' => 'form-control select2', 'multiple' => 'multiple', 'id' => 'selectall-clips' ]) !!}
                    <p class="help-block"></p>
                    @if($errors->has('clips'))
                        <p class="help-block">
                            {{ $errors->first('clips') }}
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

    <script>
        $("#selectbtn-clips").click(function(){
            $("#selectall-clips > option").prop("selected","selected");
            $("#selectall-clips").trigger("change");
        });
        $("#deselectbtn-clips").click(function(){
            $("#selectall-clips > option").prop("selected","");
            $("#selectall-clips").trigger("change");
        });
    </script>
@stop