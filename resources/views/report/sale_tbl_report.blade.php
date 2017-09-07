<?php
$base_url = asset('/');
?>
@extends('layouts.admin-form')
@section('title',_t('Sale Report'))
@section('css')
    @parent
@endsection
@section('content')
    <link href="{{$base_url}}assets/global/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" type="text/css" />
    <div class="row">
        <div class="col-md-3 col-sm-4"  style="border-radius: 5px!important;">
            <div class="col-md-12" style="padding-bottom: 20px !important;">
                <div class="caption" style="text-align: center">
                    <span style="font-size: 18px; color:#F16623;"><b><u>SALE REPORT BY <DATE></DATE></u></b></span>
                </div>
            </div>
            <br>
            <form action="{{url('/report/select-sale-report')}}" method="get">
                <div class="form-group">
                    <div class="col-md-12 input-daterange">
                        <label class="control-label col-md-12">Select From Date</label>
                        <div class="input-group input-medium date date-picker" data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                            <input type="text" id="select_date" name="from_date" class="form-control form-control-inline" value="{{ $from_date }}">
                            <span class="input-group-btn">
                                <button class="btn default" type="button">
                                    <i class="fa fa-calendar"></i>
                                </button>
                            </span>
                        </div>
                        <br>
                        <label class="control-label col-md-12">Select To Date</label>
                        <div class="input-group input-medium date date-picker" data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                            <input type="text" id="select_date" name="to_date" class="form-control form-control-inline" value="{{ $to_date }}">
                            <span class="input-group-btn">
                                <button class="btn default" type="button">
                                    <i class="fa fa-calendar"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
                <br>
                <div class="col-md-12" style="padding-top: 10px !important;">
                    <button type="submit" class="btn green search-report">
                        <i class="fa fa-check"></i> Search</button>
                </div>
            </form>
            <br>
        </div>
        <div class="col-md-9 col-sm-8 show-all-data-by-shift">
            @foreach($tbl_all_reports as $report)
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-calendar"></i> <b>Report Sale</b>
                        </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"> </a>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <div class="form-body ">
                            <div class="form-group form-md-line-input has-success">
                                <label class="col-md-3 control-label" for="form_control_1"><b>TOTAL QTY :</b></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="form_control_1" value=" {{$report->sum_total_qty}}" readonly>
                                    <div class="form-control-focus"> </div>
                                </div>
                            </div>
                            <div class="form-group form-md-line-input">
                                <label class="col-md-3 control-label" for="form_control_1"><b>SUB TOTAL :</b></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="form_control_1" value="$ {{$report->sum_sub_total}}" readonly>
                                    <div class="form-control-focus"> </div>
                                </div>
                            </div>
                            <div class="form-group form-md-line-input">
                                <label class="col-md-3 control-label" for="form_control_1"><b>TAX :</b></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="form_control_1" value="$ {{$report->sum_tax}}" readonly>
                                    <div class="form-control-focus"> </div>
                                </div>
                            </div>
                            <div class="form-group form-md-line-input">
                                <label class="col-md-3 control-label" for="form_control_1"><b>GRAND TOTAL :</b></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="form_control_1" value="$ {{$report->sum_total_price}}" readonly>
                                    <div class="form-control-focus"> </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@section('script')
    @parent
    <script src="{{$base_url}}assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"
            type="text/javascript"></script>
    <script src="{{$base_url}}assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"
            type="text/javascript"></script>
    <script src="{{$base_url}}assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"
            type="text/javascript"></script>
    <script src="{{$base_url}}assets/global/plugins/clockface/js/clockface.js" type="text/javascript"></script>
    <script src="{{$base_url}}assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
    <script src="{{$base_url}}assets/pages/scripts/table-datatables-responsive.min.js" type="text/javascript"></script>
    <script src="{{$base_url}}assets/global/scripts/datatable.js" type="text/javascript"></script>
    <script src="{{$base_url}}assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
    <script src="{{$base_url}}assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js"
            type="text/javascript"></script>
    <script src="{{$base_url}}assets/pages/scripts/components-bootstrap-select.min.js" type="text/javascript"></script>
    <script src="{{$base_url}}assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
@endsection