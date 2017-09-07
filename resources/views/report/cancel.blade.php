@php
    $total_qty = isset($total_qty)?$total_qty:'';
    $sub_total = isset($sub_total)?$sub_total:'';
    $tax = isset($tax)?$tax:'';
    $total_price = isset($total_price)?$total_price:'';
    $delivery_date = isset($delivery_date)?$delivery_date:'';
    $delivery_time = isset($delivery_time)?$delivery_time:'';
    $name = isset($name)?$name:'';
    $phone = isset($phone)?$phone:'';
    $page = isset($page)?$page:1;
@endphp
@extends('layouts.admin-list')

@section('title',_t('Sale List'))

@section('content')
    @include('stock.include.top')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-bell-o"></i>{{ _t('Sale List') }} </div>
                    <div class="tools">
                        <a href="javascript:" class="collapse"> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-scrollable table-responsive">
                        <table class="table table-striped table-bordered table-advance table-hover">
                            <thead>
                            <tr>
                                <th> </th>
                                <th> {!! get_title_search('name',$name) !!} </th>
                                <th> {!! get_title_search('phone',$phone) !!} </th>
                                <th> {!! get_title_search('total_qty',$total_qty) !!} </th>
                                <th> {!! get_title_search('sub_total',$sub_total) !!} </th>
                                <th> {!! get_title_search('tax',$tax) !!} </th>
                                <th> {!! get_title_search('total_price',$total_price) !!} </th>
                                <th> {!! get_title_search('delivery_date',$delivery_date) !!} </th>
                            </tr>

                            <tr>
                                <th> No. </th>
                                <th> {{ _t('user name') }} </th>
                                <th> {{ _t('phone') }} </th>
                                <th> {{ _t('total qty') }} </th>
                                <th> {{ _t('sub total') }} </th>
                                <th> {{ _t('tax') }} </th>
                                <th> {{ _t('grand price') }} </th>
                                <th> {{ _t('delivery date') }} </th>
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
                                    <td class="hidden-xs"> {!! highlight($row->name,$name) !!} </td>

                                    <td class="hidden-xs"> {!! highlight($row->phone,$phone) !!} </td>
                                    <td class="hidden-xs"> {!! highlight($row->total_qty,$total_qty) !!} </td>
                                    <td class="hidden-xs"> {!! highlight($row->sub_total,$sub_total) !!} </td>
                                    <td class="hidden-xs"> {!! highlight($row->tax,$tax) !!} </td>
                                    <td class="hidden-xs"> {!! highlight($row->total_price,$total_price) !!} </td>
                                    <td class="hidden-xs"> {!! highlight($row->delivery_date,$delivery_date) !!} {!! highlight($row->delivery_time,$delivery_time) !!}  </td>

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
    @parent

@endsection