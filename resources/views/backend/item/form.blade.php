@php
    $id = isset($result->id)?$result->id:old('id');
    $item_code = isset($result->item_code)?$result->item_code:'';
    $title = isset($result->title)?$result->title:'';
    $condition = isset($result->condition)?$result->condition:1;
    $image_url = isset($result->image_url)?$result->image_url:null;
    $specifics = isset($result->specifics)?json_decode($result->specifics):[];
    $start_price = isset($result->start_price)?$result->start_price:'';
    $amount = isset($result->amount)?$result->amount:'';
    $promotion_price = isset($result->promotion_price)?$result->promotion_price:'';
    $expire_date = isset($result->expire_date)?$result->expire_date:'';
    $status = isset($result->status)?$result->status:1;
    $instock = isset($result->instock)?$result->instock:1;
    $option = isset($result->option)?$result->option:null;
    $content = isset($result->content)?$result->content:'';
    $page = isset($page)?$page:1;
    $category_id = isset($result->category_id)?$result->category_id:'';
    $count = 0;
@endphp
{{--$count__ = 0;--}}
{{--$parent = isset($result->parent)?$result->parent:old('parent');--}}
@extends('layouts.admin-form')
@section('title',_t('Item Form'))
@section('css')
    @parent
    <link href="{{ $base_url }}assets/global/plugins/bootstrap-colorpicker/css/colorpicker.css" rel="stylesheet" type="text/css" />
    <link href="{{ $base_url }}assets/global/plugins/jquery-minicolors/jquery.minicolors.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('component.form',['option' => ['url' => '/backend/item-save','id'=>'fileupload'],'title' => _t('Item Form')])
    {!! Form::hidden('id',$id) !!}
    {!! Form::hidden('category_id',$category_id) !!}
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
        @if($category_id > 0)
        <h3 class="form-section">{{ _t('Category') }} : {{ \App\Models\Backend\ItemCategory::getTitle($category_id)}}</h3>
        @else
        <h3 class="form-section">{{ _t('Category') }} :{{session('item_category_title')}}</h3>
        @endif
        <div class="row">
            @component('component.input', ['label' => _t('item_code').'<span style="color: red;"></span>','sms' => ''])
                {!! Form::text('item_code',$item_code,['class'=>"form-control", 'placeholder'=>"item_code here..."]) !!}
            @endcomponent

            @component('component.input', ['label' => _t('Title').'<span style="color: red;">*</span>','sms' => ''])
            {!! Form::text('title',$title,['class'=>"form-control",'required'=>'required' ,'placeholder'=>"Title here.."]) !!}
            @endcomponent

            @component('component.input', ['label' => _t('Condition'),'sms' => ''])
            {!! Form::select('condition', condition(), $condition,['class'=>"form-control"]) !!}
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
        {{--==============================specific=============================--}}
        <div class="form-group form-md-line-input option">
            @if($id > 0 || count($specifics)>0)
                @foreach($specifics as $k =>$v)
                        <div class="{{$k}}">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-9">
                                <h3 class="form-section">{{$k}}</h3>
                                @foreach($v as $v1 => $v2)
                                <div class="input-group input-group-sm">
                                    <span class="input-group-btn btn-left">
                                        <button class="btn red-intense" type="button" disabled>Delete</button>
                                    </span>
                                        <div class="input-group-control">
                                            <input type="text" class="form-control input-sm" value="{{$v2}}" name="specifics[{{$k}}][{{$v1}}]" placeholder="" >
                                            <span class="help-block"></span>
                                            <div class="form-control-focus"> </div>
                                        </div>
                                        <span class="input-group-btn btn-right">
                                        <button class="btn green-haze add-new" type="button" data-adds="{{$k}}" >{{_t('Add')}}</button>
                                    </span>
                                </div>
                                @endforeach
                            </div>
                        </div>
                @endforeach
            @else
                <?php
                $specs = \App\Models\Backend\ItemSpec::where('category_id',session('item_category_id'))->get();
                ?>
                @if(count($specs) > 0)
                    @foreach($specs as $row_spec)
                        <?php
                            $count++;
                        ?>
                        <div class="{{$row_spec->key}}">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-9">
                                <h3 class="form-section">{{ _t($row_spec->key) }}</h3>
                                <div class="input-group input-group-sm">
                                    <span class="input-group-btn btn-left">
                                        <button class="btn red-intense" type="button" disabled>Delete</button>
                                    </span>
                                    <div class="input-group-control">
                                        <input type="text" class="form-control input-sm" name="specifics[{{$row_spec->key}}][{{$count}}]" placeholder="" >
                                        <span class="help-block"></span>
                                        <div class="form-control-focus"> </div>
                                    </div>
                                    <span class="input-group-btn btn-right">
                                        <button class="btn green-haze add-new" type="button" data-adds="{{$row_spec->key}}" >{{_t('Add')}}</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            @endif
        </div>
            {{--===============================end specific============================--}}
         <div class="row">

            @component('component.input', ['label' => _t('Start Price').'<span style="color: red;">*</span>','sms' => ''])
            {!! Form::text('start_price',$start_price,['class'=>"form-control",'required'=>'required', 'placeholder'=>"Start_price here..."]) !!}
            @endcomponent
            @component('component.input', ['label' => _t('Promotion_price').'<span style="color: red;"></span>','sms' => ''])
            {!! Form::text('promotion_price',$promotion_price,['class'=>"form-control", 'placeholder'=>"Promotion_price here..."]) !!}
            @endcomponent
            <div class="form-group">
                <label class="control-label col-md-3">Expire Promotion Dates</label>
                <div class="col-md-3">
                    <div class="input-group input-medium date date-picker" data-date-format="yyyy-mm-dd" data-date-start-date="+0d">
                        <input name="expire_date" type="text" value="{{$expire_date}}" class="form-control" readonly>
                        <span class="input-group-btn">
                        <button class="btn default" type="button">
                            <i class="fa fa-calendar"></i>
                        </button>
                    </span>
                    </div>
                </div>
            </div>
            @component('component.input', ['label' => _t('Amount').'<span style="color: red;"></span>','sms' => ''])
                {!! Form::text('amount',  $amount,['class'=>"form-control", 'placeholder'=>"Amount here..."]) !!}
            @endcomponent
            @component('component.input', ['label' => _t('Instock'),'sms' => ''])
                {!! Form::select('instock', instock(), $instock,['class'=>"form-control"]) !!}
            @endcomponent
            @component('component.input', ['label' => _t('Status'),'sms' => ''])
            {!! Form::select('status', status(), $status,['class'=>"form-control"]) !!}
            @endcomponent
        </div>
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
                    <!-- The global file processing state -->
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
    {{--<script src="{{ $base_url }}assets/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js" type="text/javascript"></script>--}}
    {{--<script src="{{ $base_url }}assets/global/plugins/jquery-minicolors/jquery.minicolors.min.js" type="text/javascript"></script>--}}
    {{--<script src="{{ $base_url }}assets/pages/scripts/components-color-pickers.min.js" type="text/javascript"></script>--}}
{{--===============================date tiem============================================--}}
    <script src="{{$base_url}}assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="{{$base_url}}assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
    <script src="{{$base_url}}assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="{{$base_url}}assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
    <script src="{{$base_url}}assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
    <script src="{{$base_url}}assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
    <script src="{{$base_url}}assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
    <script src="{{$base_url}}assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
    <script src="{{$base_url}}assets/global/plugins/clockface/js/clockface.js" type="text/javascript"></script>
    <script src="{{$base_url}}assets/global/scripts/app.min.js" type="text/javascript"></script>
    <script src="{{$base_url}}assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
    <script src="{{$base_url}}assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
    <script src="{{$base_url}}assets/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
    <script src="{{$base_url}}assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
    <script src="{{$base_url}}assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
{{--===============================end date tiem============================================--}}
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
    {{--===============item spec============== --}}
    <script type="text/javascript">
        $(function () {
            var xx_ = '{{$count}}'-0;
            var html = '';
            function hhtml(adds) {
                var timestamp = new Date().getUTCMilliseconds();
                xx_ += timestamp;
                html = '<div>' +
                    '<label class="col-md-3 control-label"></label>' +
                    '<div class="col-md-9">' +
                    '<div class="input-group input-group-sm">' +
                    '<span class="input-group-btn btn-left">' +
                    '<button class="btn red-intense del" type="button">{{_t('Delete')}}</button>' +
                    '</span>' +
                    '<div class="input-group-control">' +
                    '<input type="text" class="form-control input-sm" name="specifics['+adds+']['+(xx_++)+']" placeholder="">' +
                    '<span class="help-block"></span>' +
                    '<div class="form-control-focus"> </div>' +
                    '</div>' +
                    '<span class="input-group-btn btn-right">' +
                    '<button class="btn green-haze add-new" data-adds="'+adds+'" type="button">{{_t('Add')}}</button>' +
                    '</span>' +
                    '</div>' +
                    '</div>'+
                    '</div>';
                return html;
            }
            $('body').delegate('.add-new','click',function (e) {
                e.preventDefault();
                var wishid = $(this).data('adds');
                var number = $(this).data('number');
                $('.'+wishid).append(hhtml(wishid));
            });

            $('body').delegate('.del','click',function (e) {
                e.preventDefault();
                $(this).parent().parent().parent().parent().remove();

            });
        });
    </script>
{{--====================================================================================================--}}
    {{--<script type="text/javascript">--}}
        {{--$(function () {--}}
{{--//            $(".decimal_places").select2();--}}
            {{--var Ccount = {{$count__}};--}}
            {{--var html = ''--}}
            {{--function hhtml() {--}}
                {{--Ccount++;--}}
                {{--html = '<div>' +--}}
                    {{--'<div class="col-md-5">' +--}}
                    {{--'<div class="input-group input-group-sm">' +--}}
                    {{--'<span class="input-group-btn btn-left">' +--}}
                    {{--'<button class="btn red-intense del" type="button">{{_t('Delete')}}</button>' +--}}
                    {{--'</span>' +--}}
                    {{--'<div class="input-group-control">' +--}}
                    {{--'<input type="text" class="form-control input-sm" name="options_item_category['+Ccount+'][key]" placeholder="{{_t('Key...')}}" >' +--}}
                    {{--'<span class="help-block"></span>' +--}}
                    {{--'<div class="form-control-focus"> </div>' +--}}
                    {{--'</div>' +--}}
                    {{--'<span class="input-group-btn btn-right">' +--}}
                    {{--'</span>' +--}}
                    {{--'</div>' +--}}
                    {{--'</div>' +--}}
                    {{--'<div class="col-md-7">' +--}}
                    {{--'<div class="input-group input-group-sm">' +--}}
                    {{--'<span class="input-group-btn btn-left">' +--}}
                    {{--'</span>' +--}}
                    {{--'<div class="input-group-control">' +--}}
                    {{--'<select class="head-search-input form-control" name="options_item_category['+Ccount+']"><option value="0" selected="selected"></option><option value="1">Size</option><option value="2">Color</option></select>'+--}}
                        {{--'<input type="text" class="form-control input-sm" name="options_item_category['+Ccount+']" placeholder="{{_t('Value...')}}" >'  +--}}
                            {{--'<span class="help-block"></span>' +--}}
                    {{--'<div class="form-control-focus"> </div>' +--}}
                    {{--'</div>' +--}}
                    {{--'<span class="input-group-btn btn-right">' +--}}
                    {{--'<button class="btn green-haze add-new" type="button">{{_t('Add')}}</button>' +--}}
                    {{--'</span>' +--}}
                    {{--'</div>' +--}}
                    {{--'</div>' +--}}
                    {{--'</div>';--}}
                {{--return html;--}}
            {{--}--}}
            {{--$('body').delegate('.add-new','click',function (e) {--}}
                {{--e.preventDefault();--}}
                {{--$('.option').append(hhtml());--}}
            {{--});--}}
            {{--$('body').delegate('.del','click',function (e) {--}}
                {{--e.preventDefault();--}}
                {{--//console.log( $('.del').length);--}}
                {{--if( $('.del').length != 1){--}}
                    {{--$(this).parent().parent().parent().parent().remove();--}}
                {{--}--}}
            {{--});--}}



            {{--$('body').delegate('.parent_', 'change', function () {--}}
                {{--var iidd = $('.parent_').val();--}}
                {{--// console.log($('.parent_ option:selected').data('pa'));--}}
                {{--if($('.parent_ option:selected').data('pa') == 1){--}}
                    {{--$('.option').hide();--}}
                    {{--$('.bbtn').show();--}}
                {{--}else {--}}
                    {{--//console.log($('.parent_').val());--}}
                    {{--$('.option').show();--}}
                    {{--$.ajax({--}}
                        {{--url: '{{url('/backend/check-item-category-option')}}',--}}
                        {{--async: false,--}}
                        {{--data: {id: iidd},--}}
                        {{--error: function () {--}}
                            {{--swal({--}}
                                {{--title: "{{ _t('Server Error') }}",--}}
                                {{--text: "{{ _t('An error has occurred!') }}",--}}
                                {{--type: "warning",--}}
                                {{--confirmButtonColor: "#DD6B55",--}}
                                {{--confirmButtonText: "Close",--}}
                                {{--closeOnConfirm: false--}}
                            {{--});--}}
                        {{--},--}}
                        {{--dataType: 'json',--}}
                        {{--success: function (data) {--}}
                            {{--console.log(data);--}}
                            {{--if(data == 'true'){--}}
                                {{--swal({--}}
                                    {{--title: "{{ _t('error') }}",--}}
                                    {{--text: "{{ _t('Can not delete because it have options !!!') }}",--}}
                                    {{--type: "warning",--}}
                                    {{--confirmButtonColor: "#DD6B55",--}}
                                    {{--confirmButtonText: "Close",--}}
                                    {{--closeOnConfirm: false--}}
                                {{--});--}}
                                {{--$('.bbtn').hide();--}}
                            {{--}else {--}}
                                {{--$('.bbtn').show();--}}
                            {{--}--}}
                        {{--},--}}
                        {{--type: 'GET'--}}
                    {{--});--}}
                {{--}--}}
            {{--});--}}
        {{--});--}}
    {{--</script>--}}
    {{--<script type="text/javascript">--}}
                {{--$(function () {--}}
{{--//            $(".decimal_places").select2();--}}
                    {{--var Ccount = {{$count__}};--}}
                    {{--var html = ''--}}
                    {{--function hhtml() {--}}
                        {{--Ccount++;--}}
                        {{--html = '<div>' +--}}
                            {{--'<div class="col-md-5">' +--}}
                            {{--'<div class="input-group input-group-sm">' +--}}
                            {{--'<span class="input-group-btn btn-left">' +--}}
                            {{--'<button class="btn red-intense del" type="button">{{_t('Delete')}}</button>' +--}}
                            {{--'</span>' +--}}
                            {{--'<div class="input-group-control">' +--}}
                            {{--'<input type="text" class="form-control input-sm" name="options_item_category['+Ccount+'][key]" placeholder="{{_t('Key...')}}" >' +--}}
                            {{--'<span class="help-block"></span>' +--}}
                            {{--'<div class="form-control-focus"> </div>' +--}}
                            {{--'</div>' +--}}
                            {{--'<span class="input-group-btn btn-right">' +--}}
                            {{--'</span>' +--}}
                            {{--'</div>' +--}}
                            {{--'</div>' +--}}
                            {{--'<div class="col-md-7">' +--}}
                            {{--'<div class="input-group input-group-sm">' +--}}
                            {{--'<span class="input-group-btn btn-left">' +--}}
                            {{--'</span>' +--}}
                            {{--'<div class="input-group-control">' +--}}
                            {{--'<select class="head-search-input form-control" name="options_item_category['+Ccount+']"><option value="0" selected="selected"></option><option value="1">Size</option><option value="2">Color</option></select>'+--}}
                                {{--'<input type="text" class="form-control input-sm" name="options_item_category['+Ccount+']" placeholder="{{_t('Value...')}}" >'  +--}}
                                    {{--'<span class="help-block"></span>' +--}}
                            {{--'<div class="form-control-focus"> </div>' +--}}
                            {{--'</div>' +--}}
                            {{--'<span class="input-group-btn btn-right">' +--}}
                            {{--'<button class="btn green-haze add-new" type="button">{{_t('Add')}}</button>' +--}}
                            {{--'</span>' +--}}
                            {{--'</div>' +--}}
                            {{--'</div>' +--}}
                            {{--'</div>';--}}
                        {{--return html;--}}
                    {{--}--}}
                    {{--$('body').delegate('.add-new','click',function (e) {--}}
                        {{--e.preventDefault();--}}
                        {{--$('.option').append(hhtml());--}}
                    {{--});--}}
                    {{--$('body').delegate('.del','click',function (e) {--}}
                        {{--e.preventDefault();--}}
                        {{--//console.log( $('.del').length);--}}
                        {{--if( $('.del').length != 1){--}}
                            {{--$(this).parent().parent().parent().parent().remove();--}}
                        {{--}--}}
                    {{--});--}}
                    {{--$('body').delegate('.parent_', 'change', function () {--}}
                        {{--var iidd = $('.parent_').val();--}}
                        {{--// console.log($('.parent_ option:selected').data('pa'));--}}
                        {{--if($('.parent_ option:selected').data('pa') == 1){--}}
                            {{--$('.option').hide();--}}
                            {{--$('.bbtn').show();--}}
                        {{--}else {--}}
                            {{--//console.log($('.parent_').val());--}}
                            {{--$('.option').show();--}}
                            {{--$.ajax({--}}
                                {{--url: '{{url('/backend/check-item-category-option')}}',--}}
                                {{--async: false,--}}
                                {{--data: {id: iidd},--}}
                                {{--error: function () {--}}
                                    {{--swal({--}}
                                        {{--title: "{{ _t('Server Error') }}",--}}
                                        {{--text: "{{ _t('An error has occurred!') }}",--}}
                                        {{--type: "warning",--}}
                                        {{--confirmButtonColor: "#DD6B55",--}}
                                        {{--confirmButtonText: "Close",--}}
                                        {{--closeOnConfirm: false--}}
                                    {{--});--}}
                                {{--},--}}
                                {{--dataType: 'json',--}}
                                {{--success: function (data) {--}}
                                    {{--console.log(data);--}}
                                    {{--if(data == 'true'){--}}
                                        {{--swal({--}}
                                            {{--title: "{{ _t('error') }}",--}}
                                            {{--text: "{{ _t('Can not delete because it have options !!!') }}",--}}
                                            {{--type: "warning",--}}
                                            {{--confirmButtonColor: "#DD6B55",--}}
                                            {{--confirmButtonText: "Close",--}}
                                            {{--closeOnConfirm: false--}}
                                        {{--});--}}
                                        {{--$('.bbtn').hide();--}}
                                    {{--}else {--}}
                                        {{--$('.bbtn').show();--}}
                                    {{--}--}}
                                {{--},--}}
                                {{--type: 'GET'--}}
                            {{--});--}}
                        {{--}--}}
                    {{--});--}}
                {{--});--}}
            {{--</script>--}}
    {{--===============end item spec========== --}}
@endsection
