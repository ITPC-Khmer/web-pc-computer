@php
    $id = isset($row->id)?$row->id:0;
    $title = isset($result->title)?$result->title:'';
    $description = isset($result->description)?$result->description:'';
@endphp
@extends('layouts.admin-form')
@section('title',_t('Admin Role Form'))
@section('content')
    @component('component.form',['option' => ['url' => '/backend/role-save','id'=>'fileupload'],'title' => _t('Admin Role Form')])
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
        <h3 class="form-section">{{ _t('Enter Content') }}</h3>
        <div class="row">
            @component('component.input', ['label' => _t('Title').'<span style="color: red;">*</span>','sms' => ''])
                {!! Form::text('title',$title,['class'=>"form-control",'required'=>'required' ,'placeholder'=>"Title here.."]) !!}
            @endcomponent
            @component('component.input', ['label' => _t('description').'<span style="color: red;"></span>','sms' => ''])
                {!! Form::text('description',$description,['class'=>"form-control", 'placeholder'=>"Description here..."]) !!}
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
@section('js')
    @parent
    {{--<script type="text/javascript" src="{{ $base_url }}assets/global/plugins/ckeditor/ckeditor.js"></script>--}}
@endsection
@section('script')
@endsection