@php
    $id = isset($result->id)?$result->id:old('id');
    $title = isset($result->title)?$result->title:'';
    $description = isset($result->description)?$result->description:'';
    $content = isset($result->content)?$result->content:'';
    $status = isset($result->status)?$result->status:1;
    $page = isset($page)?$page:1;
    $option = isset($result->option)?$result->option:null;
    $video_url = isset($result->video_url)?$result->video_url:null;
    $image_url = isset($result->image_url)?$result->image_url:null;
@endphp
@extends('layouts.admin-form')
@section('title',_t('Blog Form'))
@section('content')
    @component('component.form',['option' => ['url' => '/backend/blog-save','id'=>'fileupload'],'title' => _t('Blog Form')])
        {!! Form::hidden('id',$id) !!}
        {!! Form::hidden('_page',$page) !!}
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="form-body">
            <h3 class="form-section">{{ _t('Upload Image') }}</h3>
            <div class="row">
                <div class="fileupload-buttonbar">
                <span class="btn green fileinput-button">
                    <i class="fa fa-plus"></i><span> {{ _t('Add files') }}... </span>
                    <input type="file" name="files[]" multiple="multiple">
                </span>
                    <button type="button" class="btn blue start">
                        <i class="fa fa-upload"></i>
                        <span> {{ _t('Start upload') }} </span>
                    </button>
                    <span class="fileupload-process"> </span>
                </div>
                @if(count($image_url)>0)
                    <div style="display: none;" class="d-detele-img"></div>
                    <table role="presentation" class="table table-striped clearfix">
                        <tbody class="">
                        @foreach($image_url as $img)
                            <tr class="template-download fade in">
                                <td>
                                    <span class="preview">
                                        <input type="hidden" name="image_url[]" value="{{ $img }}">
                                        <a href="{{ asset("uploads/files/{$img}") }}"
                                           title="{{ $img }}"
                                           download="{{ $img }}"
                                           data-gallery="">
                                            <img src="{{ asset("uploads/files/tmp2/{$img}") }}">
                                        </a>
                                    </span>
                                </td>
                                <td>
                                    <p class="name">
                                        <a href="{{ asset("uploads/files/{$img}") }}" title="{{ $img }}" download="{{ $img }}" data-gallery="">{{ $img }}</a>
                                    </p>
                                </td>
                                <td>
                                    <input class="form-control" value="{{ url("uploads/files/{$img}") }}">
                                </td>
                                <td>
                                    <button type="button" class="btn red btn-sm delete-upload-img-e" data-img="{{ $img }}">
                                        <i class="fa fa-trash-o"></i>
                                        <span>Delete</span>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
                @include('component.fileupload')
            </div>
            <h3 class="form-section">{{ _t('Enter Content') }}</h3>
            <div class="row">

                @component('component.input', ['label' => _t('Title').'<span style="color: red;">*</span>','sms' => ''])
                {!! Form::text('title',$title,['class'=>"form-control",'required'=>'required' ,'placeholder'=>"Title here.."]) !!}
                @endcomponent

                @component('component.input', ['label' => _t('Description').'<span style="color: red;">*</span>','sms' => ''])
                {!! Form::text('description',$description,['class'=>"form-control",'required'=>'required', 'placeholder'=>"Description here..."]) !!}
                @endcomponent

                @component('component.input', ['label' => _t('Status'),'sms' => ''])
                {!! Form::select('status', status(), $status,['class'=>"form-control"]) !!}
                @endcomponent

                <div class="form-body">
                    <div class="form-group last">
                        <div class="col-md-12">
                            {!! Form::textarea('content',$content,['class'=>"form-control ckeditor",'rows' => 6,
                 'placeholder'=>"Content here...",'style'=>"display: none;"]) !!}
                        </div>
                    </div>
                </div>
            </div>
            {{--<h3 class="form-section">{{ _t('Embed Video') }}</h3>--}}
            {{--<div class="row">--}}
                {{--@for($i = 0;$i<2;$i++)--}}
                    {{--@component('component.input', ['label' => ($i ==0? _t('Video'):''),'sms' => ''])--}}
                    {{--{!! Form::text("video_url[$i]",isset($video_url[$i])?$video_url[$i]:'',['class'=>"form-control", 'placeholder'=>"Embed Video here.."]) !!}--}}
                    {{--@endcomponent--}}
                {{--@endfor--}}
            {{--</div>--}}
            @if(_l)
                <h3 class="form-section">{{ _t('Language Option') }}</h3>
                <div class="row">
                    <div class="col-md-2 col-sm-3 col-xs-4">
                        <ul class="nav nav-tabs tabs-left">
                            @foreach(arr_lang() as $k => $v)
                                <li{{ $k=='kh'?' class=active ':'' }}>
                                    <a {{ $k=='kh'?' aria-expanded=true ':'' }}  href="#tab{{ $k }}" data-toggle="tab"> {{ $v }} </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-md-10 col-sm-9 col-xs-8">
                        <div class="tab-content">
                            @foreach(arr_lang() as $k => $v)
                                <div class="tab-pane{{ $k=='kh'?' active':'' }}" id="tab{{ $k }}">
                                    @component('component.input', ['label' => _t('Title'),'sms' => ''])

                                    {!! Form::text("option[title][{$k}]",isset($option->title->$k)?$option->title->$k:'',['class'=>"form-control", 'placeholder'=>"Title here.."]) !!}

                                    @endcomponent

                                    @component('component.input', ['label' => _t('Description'),'sms' => ''])

                                    {!! Form::text("option[description][{$k}]",isset($option->description->$k)?$option->description->$k:'',['class'=>"form-control", 'placeholder'=>"Description here..."]) !!}

                                    @endcomponent

                                    <div class="form-body">
                                        <div class="form-group last">
                                            <div class="col-md-12">
                                                {!! Form::textarea("option[content][{$k}]",isset($option->content->$k)?$option->content->$k:'',
                                                ['class'=>"form-control ckeditor",'rows' => 6,'placeholder'=>"Content here...",'style'=>"display: none;"]) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        </div>
        @component('component.form-actions')
            <div class="row">
                <div class="col-md-offset-2 col-md-10">
                    {{--<button type="button" class="btn default">{{ _t('Back') }}</button>--}}
                    <a class="btn btn-danger" href="javascript:window.history.go(-1);">Back</a>
                    <button type="submit" name="submit" value="0" class="btn blue">{{ _t('Save') }}</button>
                    @if($id == 0)
                        <button type="submit" name="submit" value="1" class="btn blue">{{ _t('Save Next') }}</button>
                    @endif
                </div>
            </div>
        @endcomponent
    @endcomponent
@endsection
@section('js')
    @parent
    <script type="text/javascript" src="{{ $base_url }}assets/global/plugins/ckeditor/ckeditor.js"></script>
@endsection
@section('script')
    {{--use for upload file--}}
    <script src="{{ $base_url }}assets/pages/scripts/form-fileupload.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(function () {
            @if(count($image_url)>0)
            $('body').delegate('.delete-upload-img-e','click',function () {
                var img = $(this).data('img');
                $('.d-detele-img').append('<input type="hidden" name="d_image_url[]" value="'+img+'">');

                $(this).parent().parent().remove();
            });
            @endif
        });
    </script>
@endsection
