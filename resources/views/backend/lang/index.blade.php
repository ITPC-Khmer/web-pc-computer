@extends('layouts.admin-list')

@section('title',_t('Language Translate Page'))

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-bell-o"></i>{{ _t('Language List') }} </div>
                    <div class="tools">
                        <a href="javascript:" class="collapse"> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-scrollable table-responsive">
                        <table class="table table-striped table-bordered table-advance table-hover">
                            <thead>
                            <tr>
                                <th>  </th>
                                <th> {!! get_title_search('key',$key) !!} </th>
                                <th> {!! get_title_search('en',$en) !!}  </th>
                                <th> {!! get_title_search('kh',$kh) !!}  </th>
                            </tr>
                            <tr>

                                <th> No. </th>
                                <th> {{ _t('Key') }} </th>
                                <th> {{ _t('English') }} </th>
                                <th> {{ _t('Khmer') }} </th>
                            </tr>

                            </thead>
                            <tbody>
                            @php
                                $count = 1;
                            @endphp
                            @foreach ($result as $row)
                                <tr>
                                    <td class="highlight">
                                        <a href="javascript:"> {{ (($result->currentPage()-1)*$result->perPage())+$count++ }} </a>
                                    </td>
                                    <td class="hidden-xs"> {!! highlight($row->key,$key) !!}
                                    </td>
                                    <td class="hidden-xs"> <input type="text" data-id="{{ $row->id }}" data-lang = "en" class="my-lang form-control" value="{{ $row->en }}"> </td>
                                    <td class="hidden-xs"> <input type="text" data-id="{{ $row->id }}"  data-lang = "kh"  class="my-lang form-control" value="{{ $row->kh }}"> </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
            <!-- END SAMPLE TABLE PORTLET-->
        </div>
    </div>

    <div class="row">
        <div class="col-md-5">
            <div class="dataTables_info">
                @if($result->total() > PageLimit)
                    <span>{{ $result->firstItem() }} - {{ $result->lastItem() }} of {{ $result->total() }} (for page {{ $result->currentPage() }} )</span>
                @endif
            </div>
        </div>
        <div class="col-md-6" style="text-align: right;">
            <div class="dataTables_paginate paging_bootstrap_full_number">
                {{ $result->links() }}
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        var current_url = '{{ url()->current() }}';

        function save_lang(th) {

            var id = th.data('id');
            var lan = th.data('lang');
            var lang_val = th.val();


            $.ajax({
                url : '{{ url('/backend/lang-save') }}',
                data : {id : id,lan : lan,lang_val:lang_val},
                error: function() {
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
                success: function(data) {

                },
                type: 'POST'
            });
        }


        $(function () {

            $('.my-lang').on('change',function () {
                save_lang($(this));
            });

            $('.head-search-th').on('click',function () {
                go_search();
            });

            $('.head-search-input').on( "keydown", function(event) {
                var keycode = event.keyCode || event.which;
                if(keycode == '13') {
                    go_search();
                }
            });

        });


        function go_search() {
            var url_param = current_url + '?' ;
            $('.head-search-th').each(function () {
                var input = $(this).parent().parent().find('input');
                var n = input.data('name');
                var v = input.val();

                if($.trim(v) != '')  url_param += '&'+n+'='+encodeURIComponent($.trim(v));

            });

            location.href = url_param;
        }
    </script>
@endsection