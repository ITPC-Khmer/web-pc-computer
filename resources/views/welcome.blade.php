@extends('layouts.admin-form')

@section('title',_t('Home'))

@section('css')
    @parent

    <link href="../assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/global/plugins/clockface/css/clockface.css" rel="stylesheet" type="text/css" />
@endsection


@section('breadcrumb')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>XXX</span>
            </li>
        </ul>
    </div>
@endsection


@section('content')

    @component('component.form',['option' => ['url' => 'sales/inv','id'=>'fileupload'],'title' => 'Form Test'])

    <div class="form-body">
        <h3 class="form-section">Person Info</h3>
        <div class="row">
            <div class="col-md-6">
                @component('component.input', ['label' => 'Title','sms' => ''])
                {!! Form::text('xxx',null,['class'=>"form-control", 'placeholder'=>"Chee Kin"]) !!}
                @endcomponent
            </div>
            <!--/span-->
            <div class="col-md-6">
                @component('component.input', ['label' => 'Title','sms' => ''])
                <select name="foo" class="form-control"></select>
                @endcomponent
            </div>
            <!--/span-->
        </div>
        <!--/row-->
        <div class="row">
            <div class="col-md-6">
                @component('component.input', ['label' => 'Title','sms' => ''])
                {!! Form::text('xxx',null,['class'=>"form-control", 'placeholder'=>"Chee Kin"]) !!}
                @endcomponent
            </div>
            <!--/span-->
            <div class="col-md-6">
                @component('component.input', ['label' => 'Title','sms' => ''])
                {!! Form::text('xxx',null,['class'=>"form-control", 'placeholder'=>"Chee Kin"]) !!}
                @endcomponent
            </div>
            <!--/span-->
        </div>
    </div>
    @component('component.form-actions')
    <div class="fileupload-buttonbar">
                    <span class="btn green fileinput-button">
                                <i class="fa fa-plus"></i><span> Add files... </span>
                                <input type="file" name="files[]" multiple="multiple">
                    </span>
        <button type="reset" class="btn red cancel">
            <i class="fa fa-ban-circle"></i>
            <span> Cancel upload </span>
        </button>
        <button type="submit" class="btn blue start">
            <i class="fa fa-upload"></i>
            <span> Start upload </span>
        </button>
        <!-- The global file processing state -->
        <span class="fileupload-process"> </span>
    </div>
    @endcomponent

    {{--use for upload file--}}
    @include('component.fileupload')

    @endcomponent

@endsection


@section('script')
    {{--use for upload file--}}



@endsection
