@php
    $id = isset($result->id)?$result->id:old('id');
    $name = isset($result->name)?$result->name:'';
    $phone = isset($result->phone)?$result->phone:'';
    $email = isset($result->email)?$result->email:'';
    $note = isset($result->note)?$result->note:'';
    $role_id = isset($result->role_id)?$result->role_id:0;
    $page = isset($page)?$page:1;
@endphp
@extends('layouts.admin-form')
@section('title',_t('Admin Form'))
@section('css')
    @parent
@endsection
@section('content')
    @component('component.form',['option' => ['url' => '/backend/admin-save','id'=>'fileupload'],'title' => _t('Admin')])
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
            <div class="row">

                <div class="form-group form-md-line-input">
                    {!! Form::label('role_id', _t('Role'), ['class' => 'col-md-3 control-label']) !!}
                    <div class="col-md-9">
                        {!! Form::select('role_id',  \App\Models\Backend\Role::getOption(), $role_id,['class' => 'form-control','placeholder' => 'Pick a role...']) !!}
                        <div class="form-control-focus"> </div>
                        <span class="help-block">Some help goes here...</span>
                    </div>
                </div>

                @component('component.input', ['label' => _t('name').'<span style="color: red;">*</span>','sms' => ''])
                    {!! Form::text('name',$name,['class'=>"form-control",'required'=>'required' ,'placeholder'=>"name here.."]) !!}
                @endcomponent
                @component('component.input', ['label' => _t('phone').'<span style="color: red;"></span>','sms' => ''])
                    {!! Form::text('phone',$phone,['class'=>"form-control", 'placeholder'=>"phone here..."]) !!}
                @endcomponent
                @component('component.input', ['label' => _t('email').'<span style="color: red;"></span>','sms' => ''])
                    {!! Form::email('email',$email,['class'=>"form-control", 'placeholder'=>"email here..."]) !!}
                @endcomponent
                @if($id- 0 == 0)
                    @component('component.input', ['label' => _t('password').'<span style="color: red;"></span>','sms' => ''])
                        {!! Form::password('password',['class'=>"form-control", 'placeholder'=>"password here..."]) !!}
                    @endcomponent
                    @component('component.input', ['label' => _t('password_confirmation').'<span style="color: red;"></span>','sms' => ''])
                        {!! Form::password('password_confirmation',['class'=>"form-control", 'placeholder'=>"password_confirmation here..."]) !!}
                    @endcomponent
                @else
                    @component('component.input', ['label' => _t('password').'<span style="color: red;"></span>','sms' => ''])
                        {!! Form::password('password',['class'=>"form-control", 'placeholder'=>"password here..."]) !!}
                    @endcomponent
                    @component('component.input', ['label' => _t('password_confirmation').'<span style="color: red;"></span>','sms' => ''])
                        {!! Form::password('password_confirmation',['class'=>"form-control", 'placeholder'=>"password_confirmation here..."]) !!}
                    @endcomponent
                @endif
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
@endsection
@section('script')
    <script src="{{ $base_url }}assets/pages/scripts/form-fileupload.js" type="text/javascript"></script>
@endsection
