@php

@endphp

@extends('layouts.admin-form')

@section('title',_t('Select Category'))

@section('content')

    @component('component.form',['option' => ['url' => '/item-session','id'=>'fileupload'],'title' => _t('Page Form')])
    <input type="hidden" id="id" name="id" value="0">
    <input type="hidden" id="category_title" name="category_title" value="0">

    @component('component.input', ['label' => _t('Title').'<span style="color: red;">*</span>','sms' => ''])
    <div class="col-md-12 select-category">

    </div>
    @endcomponent
<br>
    {{--@component('component.form-actions')--}}
    {{--<div class="row">--}}
        {{--<div class="col-md-offset-2 col-md-10">--}}
            {{--<button type="button" class="btn default">{{ _t('Back') }}</button>--}}
            {{--<a class="btn btn-danger" href="javascript:window.history.go(-1);">Back</a>--}}
            {{--<button type="submit" name="submit" value="0" class="btn blue">{{ _t('Save') }}</button>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--@endcomponent--}}

    @endcomponent

@endsection

@section('js')
    @parent

@endsection

@section('script')
    <script type="text/javascript">

        function getCat(id) {
            $.ajax({
                url: '{{url('/backend/get-category')}}',
                data: {id :id},
                error: function () {
                    swal({
                        title: "{{ _t('error') }}",
                        text: "{{ _t('An error has occurred!') }}",
                        type: "warning",
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Close",
                        closeOnConfirm: false
                    });
                },
                dataType: 'html',
                success: function (data) {
                    $('.select-category').append(data);
                },
                type: 'GET'
            });
        }
        $(function () {


            getCat(0);


            var Category_ = '';
            $('body').delegate('.cat-id', 'change', function (e) {
                var id = $(this).val();
                $(this).parent().nextAll().remove();
                getCat(id);

                $(".cat-id option:selected").each(function() {
//                    alert(this.text + ' ' + this.value);
                    Category_ += this.text+' => ';
                });

//                var zzz = $(this).text();
//                Category_ += zzz+' / ';
                $('#id').val(id);
                $('#category_title').val(Category_);
                console.log(Category_);
                Category_ = '';
            });
        });
    </script>
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


