@php
    $id = isset($result->id)?$result->id:old('id');
    $key = isset($result->key)?$result->key:'';
    $title = isset($result->title)?$result->title:'';
    $key_type = isset($result->key_type)?$result->key_type:'text';
    $page = isset($page)?$page:1;
@endphp

@extends('layouts.admin-form')

@section('title',_t('Web Setting Form'))

@section('content')
    @component('component.form',['option' => ['url' => '/backend/web-setting-save','id'=>'fileupload'],'title' => _t('Web Setting Form')])
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
                @component('component.input', ['label' => _t('key'),'sms' => ''])
                    {!! Form::text('key',$key,['class'=>"form-control", 'placeholder'=>"key here..."]) !!}
                @endcomponent
                @component('component.input', ['label' => _t('Title'),'sms' => ''])
                    {!! Form::text('title',$title,['class'=>"form-control", 'placeholder'=>"Title here.."]) !!}
                @endcomponent
                @component('component.input', ['label' => _t('key_type'),'sms' => ''])
                    {!! Form::select('key_type', key_type(), $key_type,['class'=>"form-control"]) !!}
                @endcomponent

            </div>


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

