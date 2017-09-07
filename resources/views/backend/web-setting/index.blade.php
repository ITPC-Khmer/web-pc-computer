@php

    $category_id = isset($row->category_id)?$row->category_id:0;

@endphp
@extends('layouts.admin-form')

@section('title','Web Setting Update Page')

@section('content')
    <div class="portlet-body">
        <div class="table-scrollable table-responsive">
            <table class="table table-striped table-bordered table-advance table-hover">
                @foreach($rows as $row)
                <tr>
                    <td>{{ $row->title }}</td>
                    <td>
                        @if($row->key_type == 'text')
                            <input type="text" data-id="{{ $row->id }}" class="txt-web-setting" value="{{ $row->key_value }}">
                        @elseif($row->key_type == 'select')

                            <select data-id="{{ $row->id }}" multiple  name="category_id[]"
                                    class="category_id form-control txt-web-setting-select">
                                <option value="" data-last="-1" class="category_id"></option>
                                {!! \App\Models\Backend\ItemCategory::getOptionMulti($row->key_value!=''?json_decode($row->key_value):[]) !!}
                            </select>

                        @elseif($row->key_type == 'file')
                            <?php
                            $img = $row->key_value != ''?asset("uploads/files/$row->key_value"):'https://upload.wikimedia.org/wikipedia/commons/thumb/6/6c/No_image_3x4.svg/1024px-No_image_3x4.svg.png';
                            ?>
                            <form target="my_iframe" action="{{ url('backend/web-setting-save-file') }}" method="post" enctype="multipart/form-data">
                                {!! csrf_field() !!}
                                <input type="hidden" name="id" value="{{ $row->id }}">
                                <input type="file" name="my_file"><button type="submit">upload</button>
                            </form>
                            <img src="{{ $img }}" height="80" id="my_image_{{ $row->id }}">
                        @endif
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>

    <iframe name="my_iframe" id="my_iframe" style="display: none;"></iframe>
@endsection

@section('script')
    <script>

        function showMyImage(id,image) {
            $('#my_image_'+id).prop('src',image);
        }

        $(function () {

            $('.category_id').select2();

            $('.txt-web-setting').on('change',function () {
                var key_value = $(this).val();
                var id = $(this).data('id');
                $.ajax({
                    url: '{{ url('backend/web-setting-save-text') }}',
                    async: true,
                    data: {
                        id : id,
                        key_value:key_value,
                        _token:'{{ csrf_token() }}'
                    },
                    error: function () {
                        alert('save error!!');
                    },
                    dataType: 'json', //  html / json
                    type: 'POST',
                    success: function (d) {
                        if(d.error - 0 > 0){
                            alert('save error!!');
                        }
                    }
                });

            });


            $('.txt-web-setting-select').on('change',function () {
                var key_value = $(this).val();
                var id = $(this).data('id');
               // alert(key_value);
                $.ajax({
                    url: '{{ url('backend/web-setting-save-text-select') }}',
                    async: true,
                    data: {
                        id : id,
                        key_value:key_value,
                        _token:'{{ csrf_token() }}'
                    },
                    error: function () {
                        alert('save error!!');
                    },
                    dataType: 'json', //  html / json
                    type: 'POST',
                    success: function (d) {
                        if(d.error - 0 > 0){
                            alert('save error!!');
                        }
                    }
                });

            });

        });

    </script>
@endsection