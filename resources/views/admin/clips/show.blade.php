@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.clips.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.clips.fields.label')</th>
                            <td field-key='label'>{{ $clip->label }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.clips.fields.description')</th>
                            <td field-key='description'>{!! $clip->description !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.clips.fields.clip-upload')</th>
                            <td field-key='clip_upload'>@if($clip->clip_upload)<a href="{{ asset(env('UPLOAD_PATH').'/' . $clip->clip_upload) }}" target="_blank">Download file</a>@endif</td>
                        </tr>
                        <tr>
                            <th>@lang('global.clips.fields.industry')</th>
                            <td field-key='industry'>{{ $clip->industry->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.clips.fields.brand')</th>
                            <td field-key='brand'>{{ $clip->brand->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.clips.fields.states')</th>
                            <td field-key='states'>{{ $clip->states->state or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.clips.fields.products')</th>
                            <td field-key='products'>{{ $clip->products->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.clips.fields.notes')</th>
                            <td field-key='notes'>{!! $clip->notes !!}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#clip_filters" aria-controls="clip_filters" role="tab" data-toggle="tab">Clip Filters</a></li>
<li role="presentation" class=""><a href="#states" aria-controls="states" role="tab" data-toggle="tab">States</a></li>
<li role="presentation" class=""><a href="#brands" aria-controls="brands" role="tab" data-toggle="tab">Brands</a></li>
<li role="presentation" class=""><a href="#products" aria-controls="products" role="tab" data-toggle="tab">Products</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="clip_filters">
<table class="table table-bordered table-striped {{ count($clip_filters) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.clip-filters.fields.filter-by')</th>
                        <th>@lang('global.clip-filters.fields.filters')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($clip_filters) > 0)
            @foreach ($clip_filters as $clip_filter)
                <tr data-entry-id="{{ $clip_filter->id }}">
                    <td field-key='filter_by'>{{ $clip_filter->filter_by }}</td>
                                <td field-key='filters'>{{ $clip_filter->filters->label or '' }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.clip_filters.restore', $clip_filter->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.clip_filters.perma_del', $clip_filter->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('clip_filter_view')
                                    <a href="{{ route('admin.clip_filters.show',[$clip_filter->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('clip_filter_edit')
                                    <a href="{{ route('admin.clip_filters.edit',[$clip_filter->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('clip_filter_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.clip_filters.destroy', $clip_filter->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="7">@lang('global.app_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="states">
<table class="table table-bordered table-striped {{ count($states) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.states.fields.state')</th>
                        <th>@lang('global.states.fields.slug')</th>
                        <th>@lang('global.states.fields.clips')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($states) > 0)
            @foreach ($states as $state)
                <tr data-entry-id="{{ $state->id }}">
                    <td field-key='state'>{{ $state->state }}</td>
                                <td field-key='slug'>{{ $state->slug }}</td>
                                <td field-key='clips'>
                                    @foreach ($state->clips as $singleClips)
                                        <span class="label label-info label-many">{{ $singleClips->label }}</span>
                                    @endforeach
                                </td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.states.restore', $state->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.states.perma_del', $state->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('state_view')
                                    <a href="{{ route('admin.states.show',[$state->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('state_edit')
                                    <a href="{{ route('admin.states.edit',[$state->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('state_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.states.destroy', $state->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="8">@lang('global.app_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="brands">
<table class="table table-bordered table-striped {{ count($brands) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.brands.fields.name')</th>
                        <th>@lang('global.brands.fields.slug')</th>
                        <th>@lang('global.brands.fields.clips')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($brands) > 0)
            @foreach ($brands as $brand)
                <tr data-entry-id="{{ $brand->id }}">
                    <td field-key='name'>{{ $brand->name }}</td>
                                <td field-key='slug'>{{ $brand->slug }}</td>
                                <td field-key='clips'>
                                    @foreach ($brand->clips as $singleClips)
                                        <span class="label label-info label-many">{{ $singleClips->label }}</span>
                                    @endforeach
                                </td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.brands.restore', $brand->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.brands.perma_del', $brand->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('brand_view')
                                    <a href="{{ route('admin.brands.show',[$brand->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('brand_edit')
                                    <a href="{{ route('admin.brands.edit',[$brand->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('brand_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.brands.destroy', $brand->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="8">@lang('global.app_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="products">
<table class="table table-bordered table-striped {{ count($products) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.products.fields.name')</th>
                        <th>@lang('global.products.fields.slug')</th>
                        <th>@lang('global.products.fields.clips')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($products) > 0)
            @foreach ($products as $product)
                <tr data-entry-id="{{ $product->id }}">
                    <td field-key='name'>{{ $product->name }}</td>
                                <td field-key='slug'>{{ $product->slug }}</td>
                                <td field-key='clips'>
                                    @foreach ($product->clips as $singleClips)
                                        <span class="label label-info label-many">{{ $singleClips->label }}</span>
                                    @endforeach
                                </td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.products.restore', $product->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.products.perma_del', $product->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('product_view')
                                    <a href="{{ route('admin.products.show',[$product->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('product_edit')
                                    <a href="{{ route('admin.products.edit',[$product->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('product_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.products.destroy', $product->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="8">@lang('global.app_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.clips.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
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

@stop
