@extends('layouts.admin-report')

@section('title',_t('Report Page'))
    @section('content')
    <div class="row">
            <div class="col-md-12">
                <div class="col-md-8">
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-3 control-label">{{_t('FROM')}} : </label>
                                <div class="col-md-9 input-group input-medium date date-picker" data-date-format="yyyy-mm-dd">
                                    <input name="from_date" id="from-date" type="text" value="" class="form-control" readonly>
                                    <span class="input-group-btn">
                                <button class="btn default" type="button">
                                    <i class="fa fa-calendar"></i>
                                </button>
                            </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-3 control-label">{{_t('TO')}} : </label>
                                <div class="col-md-9 input-group input-medium date date-picker" data-date-format="yyyy-mm-dd">
                                    <input name="to_date" id="to-date" type="text" value="" class="form-control" readonly>
                                    <span class="input-group-btn">
                                        <button class="btn default" type="button">
                                            <i class="fa fa-calendar"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group" style="text-align: left !important;">
                        <div class="input-group">
                            <input type="text" id="q" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                                <button id="search-report-by-date" class="btn red" type="button">{{_t('Search')}}</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>


        <div class="col-md-12 report-item-list">

        </div>
    </div>
    @endsection
@section('script')
    @parent
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
    <script>
        //    ====================get print file====================
        function printContent(el) {
            var restorepage = document.body.innerHTML;
            var printcontent = document.getElementById(el).innerHTML;
            document.body.innerHTML = printcontent;
            window.print();
            document.body.innerHTML = restorepage;
        }

        $(function(){
            $('#search-report-by-date').on('click', function (e) {
                e.preventDefault();
                var report_url = $('.report-option:checked').data('url');
                var from_date = $('#from-date').val();
                var to_date = $('#to-date').val();

                var q = $('#q').val();
                if (report_url) {
                    $.ajax({
                        url: report_url,
                        type: 'GET',
                        dataType: 'html',
                        data: {
                            from_date: from_date,
                            to_date: to_date,
                            q:q
                        },
                        success: function (d) {
                            $('.report-item-list').html(d);
                        },
                        error: function (d) {
                            alert('error');
                        }
                    });
                } else {
                    swal("OOps.., No Data!", "Please, select report type and date first.")
                }
            });
            $('body').delegate('.my-paginate ul li a', 'click', function (e) {
                e.preventDefault();
                var report_url = $(this).prop('href');
                $.ajax({
                    url: report_url,
                    type: 'GET',
                    dataType: 'html',
                    success: function (d) {
                        $('.report-item-list').html(d);
                    },
                    error: function (d) {
                        alert('error');
                    }
                });
            });
        });
    </script>
@endsection