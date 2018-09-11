@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.states.title')</h3>
    
    {!! Form::model($state, ['method' => 'PUT', 'route' => ['admin.states.update', $state->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('state', trans('global.states.fields.state').'', ['class' => 'control-label']) !!}
                    {!! Form::text('state', old('state'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('state'))
                        <p class="help-block">
                            {{ $errors->first('state') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('slug', trans('global.states.fields.slug').'', ['class' => 'control-label']) !!}
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
                    {!! Form::label('clips', trans('global.states.fields.clips').'', ['class' => 'control-label']) !!}
                    <button type="button" class="btn btn-primary btn-xs" id="selectbtn-clips">
                        {{ trans('global.app_select_all') }}
                    </button>
                    <button type="button" class="btn btn-primary btn-xs" id="deselectbtn-clips">
                        {{ trans('global.app_deselect_all') }}
                    </button>
                    {!! Form::select('clips[]', $clips, old('clips') ? old('clips') : $state->clips->pluck('id')->toArray(), ['class' => 'form-control select2', 'multiple' => 'multiple', 'id' => 'selectall-clips' ]) !!}
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

    {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger']) !!}
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