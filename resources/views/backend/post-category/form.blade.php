@php
    $id = isset($result->id)?$result->id:old('id');
    $parent = isset($result->parent)?$result->parent:old('parent');
    $title = isset($result->title)?$result->title:'';
    $description = isset($result->description)?$result->description:'';
    $status = isset($result->status)?$result->status:1;
    $show_in_home = isset($result->show_in_home)?$result->show_in_home:1;
    $page = isset($page)?$page:1;
    $option = isset($result->option)?$result->option:null;
@endphp

@extends('layouts.admin-form')

@section('title',_t('Post Category Form'))

@section('content')
    @component('component.form',['option' => ['url' => '/backend/post-category-save','id'=>'fileupload'],'title' => _t('Post Category Form')])
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
           {{-- <h3 class="form-section"></h3>--}}
            <div class="row">

                @component('component.input', ['label' => _t('Parent'),'sms' => ''])
               {{-- {!! Form::select('parent',$opc,$parent,['class'=>"form-control", 'placeholder'=>"Parent here.."]) !!}--}}
                    <select name="parent" class="form-control">
                        <option value="0"></option>
                        {!! \App\Models\Backend\PostCategory::getParent($id,$parent) !!}
                    </select>
                @endcomponent

                @component('component.input', ['label' => _t('Title'),'sms' => ''])
                {!! Form::text('title',$title,['class'=>"form-control", 'placeholder'=>"Title here.."]) !!}
                @endcomponent

                @component('component.input', ['label' => _t('Description'),'sms' => ''])
                {!! Form::text('description',$description,['class'=>"form-control", 'placeholder'=>"Description here..."]) !!}
                @endcomponent

                @component('component.input', ['label' => _t('Status'),'sms' => ''])
                {!! Form::select('status', status(), $status,['class'=>"form-control"]) !!}
                @endcomponent

                @component('component.input', ['label' => _t('Show in home'),'sms' => ''])
                {!! Form::select('show_in_home', [1=>'Show',0=>'Hide'], $show_in_home,['class'=>"form-control"]) !!}
                @endcomponent

            </div>

            @if(_l)
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

{{--@section('script')

    <script>
        function locationResultTemplater(location) {
            return location.suburb + " " + location.state + " " + location.postcode;
        }

        function locationSelectionTemplater(location) {
            if (typeof location.suburb !== "undefined") {
                return locationResultTemplater(location);
            }
            return location.text; // I think its either text or label, not sure.
        }
        $("#location").select2({
            ajax: {
                url: "/search/locations",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term, // search term
                    };
                },
                processResults: function (data) {
                    return {
                        results: data
                    };
                },
                cache: true
            },
            minimumInputLength: 1,
            placeholder: function(){
                $(this).data('placeholder');
            },
            templateResult: locationResultTemplater,
            templateSelection: locationSelectionTemplater

        });
    </script>

@endsection--}}

