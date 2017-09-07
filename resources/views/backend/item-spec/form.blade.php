@php
        $id = isset($row->id)?$row->id:0;
        $key = isset($result->key)?$result->key:'';
        $spec_type = isset($result->spec_type)?$result->spec_type:1;
        $page = isset($page)?$page:1;
        $category_id = isset($row->category_id)?$row->category_id:0;
@endphp
{{--$title = isset($result->title)?$result->title:'';--}}
@extends('layouts.admin-form')


@section('title',_t('Item Specific Form'))

@section('content')
    @component('component.form',['option' => ['url' => '/backend/item-spec-save','id'=>'fileupload'],'title' => _t('Item Specific Form')])
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

            @component('component.input', ['label' => _t('Category').'<span style="color: red;">*</span>','sms' => ''])
            <select required="required" name="category_id"
                    class="category_id form-control category-duplicate">
                <option value="0" data-last="1"></option>
                {!! \App\Models\Backend\ItemCategory::getOption($category_id) !!}
            </select>
            @endcomponent



            @component('component.input', ['label' => _t('Key').'<span style="color: red;">*</span>','sms' => ''])
            {!! Form::text('key',$key,['class'=>"form-control key-duplicate",'required'=>'required' ,'placeholder'=>"Key here.."]) !!}
            @endcomponent
            @component('component.input', ['label' => _t('spec_type'),'sms' => ''])
                {!! Form::select('spec_type', spec_type(), $spec_type,['class'=>"form-control"]) !!}
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
    @parent
    <script type="text/javascript">
//        $(function () {
//            $('.category_id').select2();
//        });
        $(function () {

            $('[name=category_id]').on('change',function (e) {

                var last = $('[name=category_id] option:selected').data('last');
                if(last-0==0){
                    $(this).val('');
                }

            });
            $('body').delegate('.key-duplicate', 'change', function () {

                var key_duplicate = $('.key-duplicate').val();
                var category_duplicate = $('.category-duplicate').val();

                $.ajax({
                    url: '{{url('/backend/item-spec-check-duplicate')}}',
                    type: 'GET',
                    dataType: 'json',
//                    async: false,
                    data: {
                        key: key_duplicate,
                        category: category_duplicate
                    },
                    success: function (data) {

                        if(data == 1){
                            alert('The "Key" has duplicate value in the same category type!!!');
                            $('.key-duplicate').val('');
                        }
                    },
                    error: function () {
                        alert('error');
                    }
                });
            });

        });

    </script>
@endsection
