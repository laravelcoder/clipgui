@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.products.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.products.fields.name')</th>
                            <td field-key='name'>{{ $product->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.products.fields.slug')</th>
                            <td field-key='slug'>{{ $product->slug }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.products.fields.clips')</th>
                            <td field-key='clips'>
                                @foreach ($product->clips as $singleClips)
                                    <span class="label label-info label-many">{{ $singleClips->label }}</span>
                                @endforeach
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.products.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop


