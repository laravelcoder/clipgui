@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.clip-filters.title')</h3>
    
    {!! Form::model($clip_filter, ['method' => 'PUT', 'route' => ['admin.clip_filters.update', $clip_filter->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('filter_by', trans('global.clip-filters.fields.filter-by').'', ['class' => 'control-label']) !!}
                    {!! Form::text('filter_by', old('filter_by'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('filter_by'))
                        <p class="help-block">
                            {{ $errors->first('filter_by') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

