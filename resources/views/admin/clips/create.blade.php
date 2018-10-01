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
                    <span class="btn btn-success fileinput-button">
                        <i class="glyphicon glyphicon-plus"></i>
                        <span>Add Clip</span>
                        {!! Form::hidden('clip_upload', old('clip_upload')) !!}
                        {!! Form::file('clip_upload', ['id' => 'fileupload', 'class' => 'form-control']) !!}
                        {{-- <input id="fileupload" type="file" name="clip_upload"> --}}
                        {!! Form::hidden('clip_upload_max_size', 500000) !!}
                        @if($errors->has('clip_upload'))
                            <p class="help-block">
                                {{ $errors->first('clip_upload') }}
                            </p>
                        @endif
                    </span>
                    <br>
                    <br>
                    <!-- The global progress bar -->
                    <div id="progress" class="progress">
                        <div class="progress-bar progress-bar-success"></div>
                    </div>
                    <div id="files" class="files"></div>
                </div>
            </div>
 


{{--             <div class="row">
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
            </div> --}}
{{--             <div class="row">
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
            </div> --}}
{{--             <div class="row">
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
            </div> --}}
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

         {{--    <div class="row">
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
            </div> --}}
{{--             <div class="row">
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
            </div> --}}
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_save'), ['id' => 'formsubmit' ,'class' => 'btn btn-danger']) !!}
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
    <script id="template-upload" type="text/x-tmpl">
    {% for (var i=0, file; file=o.files[i]; i++) { %}
        <tr class="template-upload fade">
            <td>
                <span class="preview"></span>
            </td>
            <td>
                <p class="name">{%=file.name%}</p>
                <strong class="error text-danger"></strong>
            </td>
            <td>
                <p class="size">Processing...</p>
                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
            </td>
            <td>
                {% if (!i && !o.options.autoUpload) { %}
                    <button class="btn btn-primary start" disabled>
                        <i class="glyphicon glyphicon-upload"></i>
                        <span>Start</span>
                    </button>
                {% } %}
                {% if (!i) { %}
                    <button class="btn btn-warning cancel">
                        <i class="glyphicon glyphicon-ban-circle"></i>
                        <span>Cancel</span>
                    </button>
                {% } %}
            </td>
        </tr>
    {% } %}
    </script>
    <script>
// https://www.cloudways.com/blog/laravel-multiple-files-images-upload/
    $(function () {
        $('#fileupload').fileupload({
            dataType: 'json',
            autoUpload: false,

            add: function (e, data) {
                $('#loading').text('Uploading...');
                data.submit();
            },
            done: function (e, data) {
                $.each(data.result.files, function (index, file) {
                    $('<p/>').html(file.name + ' (' + file.size + ' KB)').appendTo($('#files_list'));
                    if ($('#file_ids').val() != '') {
                        $('#file_ids').val($('#file_ids').val() + ',');
                    }
                    $('#file_ids').val($('#file_ids').val() + file.fileID);
                });
                $('#loading').text('');
            }
        });
    });

        $(function () {
            // var uploadButton = $('#formsubmit')
            //     .on('click', function () {
            //         var $this = $(this), data = $this.data();
            //         $this.off('click').text('Abort').on('click', function () {
            //             $this.remove();
            //             data.abort();
            //         });
            //         data.submit().always(function () {
            //             $this.remove();
            //         });
            //     });
            $('#fileupload').fileupload({

                dataType: 'json',

                add: function (e, data) {
                    $('#loading').text('Uploading...');
                    data.submit();
                },
 

                // add: function (e, data) {
                //     var that = this;
                //         $.blueimp.fileupload.prototype.options.add.call(that, e, data);
                //     var jqXHR = data.submit()
                //         .success(function (result, textStatus, jqXHR) {
                //             alert("File uploaded successfully"); 
                //             console.log("File uploaded successfully");
                //         })
                //         .error(function (jqXHR, textStatus, errorThrown) {
                //             if (errorThrown === 'abort') {
                //                 alert('File Upload has been canceled');
                //             }
                //         })
                //         .complete(function (result, textStatus, jqXHR) {/* ... */});
                // },
                autoUpload: false,
                // disableImageResize: /Android(?!.*Chrome)|Opera/.test(window.navigator && navigator.userAgent),
                // imageMaxWidth: 400,
                // imageMaxHeight: 600,
                // imageCrop: true,
                acceptFileTypes: /(\.|\/)(mp4|mov|mpg|mpeg|wmv|mkv)$/i,
            
                done: function (e, data) {
                    $.each(data.result.files, function (index, file) {
                        $('<p/>').html(file.name + ' (' + file.size + ' KB)').appendTo($('#files_list'));
                        if ($('#file_ids').val() != '') {
                            $('#file_ids').val($('#file_ids').val() + ',');
                        }
                        $('#file_ids').val($('#file_ids').val() + file.fileID);
                    });
                    $('#loading').text('');
                }
            })
            .on('fileuploadadd', function (e, data) {
                data.context = $('<div/>').appendTo('#files');
                $.each(data.files, function(index, file) {
                    var node = $('<p/>').append($('<span/>').text(file.name));
                    node.appendTo(data.context);
                });
                console.log('added clip to uploader');
            })
            .on('fileuploadprocessalways', function (e, data) {
                var index = data.index,

                    file = data.files[index],
                    node = $(data.context.children()[index]);
                    
                if (file.preview) {  node.prepend('<br>').prepend(file.preview); }
                console.log('Processing ' + data.files[data.index].name);
            })
            .on('fileuploadprogressall', function (e, data) {
                var progress = parseInt(data.loaded / data.total * 100, 10);
                $('#progress .progress-bar').css( 'width', progress + '%');
            })
            .on('fileuploaddone', function (e, data) {
                $.each(data.result.files, function (index, file) {
                    if (file.url) {
                        var link = $('<a>')
                            .attr('target', '_blank')
                            .prop('href', file.url);
                        $(data.context.children()[index])
                            .wrap(link);
                    } else if (file.error) {
                        var error = $('<span class="text-danger"/>').text(file.error);
                        $(data.context.children()[index])
                            .append('<br>')
                            .append(error);
                    }
                });
            });
   
        });
    </script>
@stop