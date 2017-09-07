@extends('layouts.admin')

@section('css')
    @parent
    <style>
        .form-group.form-md-line-input{
            margin: 0 !important;
            padding-top: 0px !important;
        }
    </style>

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{ $base_url }}assets/global/plugins/bootstrap-sweetalert/sweetalert.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{ $base_url }}assets/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css" rel="stylesheet" type="text/css" />
    <link href="{{ $base_url }}assets/global/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css" />
@endsection

@section('js')
    @parent
    <script src="{{ $base_url }}assets/global/plugins/bootstrap-sweetalert/sweetalert.min.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ $base_url }}assets/pages/scripts/ui-sweetalert.min.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{ $base_url }}assets/global/plugins/bootstrap-modal/js/bootstrap-modalmanager.js" type="text/javascript"></script>
    <script src="{{ $base_url }}assets/global/plugins/bootstrap-modal/js/bootstrap-modal.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
@endsection

@section('script')

    @parent
    <script type="text/javascript">
        var current_url = '{{ url()->current() }}';

        $(function () {
            $('.instock-ch').on('change',function () {
                var id = $(this).data('id');
                var instock = $(this).val() - 0;
                var url  = $(this).data('url');
                $.ajax({
                    url: url,
                    data: {id: id,instock:instock},
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
                    success: function (data) { },
                    type: 'POST'
                });

            });
        });

        $(function () {
            $('.spec-type-ch').on('change',function () {
                var id = $(this).data('id');
                var spec_type = $(this).val() - 0;
                var url  = $(this).data('url');
                $.ajax({
                    url: url,
                    data: {id: id,spec_type:spec_type},
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
                    success: function (data) { },
                    type: 'POST'
                });

            });



//            ==================
            $('.status-ch').on('change',function () {
                var id = $(this).data('id');
                var status = $(this).val() - 0;
                var url  = $(this).data('url');
                $.ajax({
                    url: url,
                    data: {id: id,status:status},
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
                    success: function (data) { },
                    type: 'POST'
                });

            });

            $('body').delegate('.vm-del', 'click', function (e) {
                e.preventDefault();
                var tr = $(this).parent().parent().parent();
                var id = $(this).data('id') - 0;
                var href = $(this).data('href');
                swal({
                        title: "{{ _t('Are you sure?') }}",
                        text: "{{ _t('You will not be able to recover this data!') }}",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes, delete it!",
                        closeOnConfirm: false
                    },
                    function () {
                        $.ajax({
                            url: href,
//                            async: false,
                            data: {id: id,_method:'delete'},
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
                            dataType: 'json',
                            success: function (data) {
//                                console.log(data);// affected
                                if (data.affected - 0 > 0) {
                                    tr.remove();
                                    swal("Deleted!", "{{ _t('Your imaginary file has been deleted') }}", "success");
                                } else {
                                    swal({
                                        title: "{{ _t('error') }}",
                                        text: "{{ _t('An error has occurred!') }}",
                                        type: "warning",
                                        confirmButtonColor: "#DD6B55",
                                        confirmButtonText: "Close",
                                        closeOnConfirm: false
                                    });
                                }
                            },
                            type: 'POST'
                        });


                    });
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
                if(input.length > 0){
                    var n = input.data('name');
                    var v = input.val();
                }else {
                    input = $(this).parent().parent().find('.select');

                    var n = input.data('name');
                    var v = input.val();
                }

                if($.trim(v) != '')  url_param += '&'+n+'='+encodeURIComponent($.trim(v));

            });

            location.href = url_param;
        }
    </script>
@endsection