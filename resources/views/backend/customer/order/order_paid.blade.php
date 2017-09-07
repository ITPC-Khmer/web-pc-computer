@php
    $id = isset($id)?$id:'';
    $delivery_date = isset($delivery_date)?$delivery_date:'';
    $delivery_time = isset($delivery_time)?$delivery_time:'';
    $name = isset($name)?$name:'';
    $phone = isset($phone)?$phone:'';
    $house_number = isset($house_number)?$house_number:'';
    $road = isset($road)?$road:'';
    $sangkat = isset($sangkat)?$sangkat:'';
    $khan = isset($khan)?$khan:'';
    $province_city = isset($province_city)?$province_city:'';
    $page = isset($page)?$page:1;
@endphp
@extends('layouts.admin-list')
@section('title',_t('Order Paid Page'))
@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-bell-o"></i>{{ _t('Order Paid List') }} </div>
                    <div class="tools">
                        <a href="javascript:" class="collapse"> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-scrollable table-responsive">
                        <table class="table table-striped table-bordered table-advance table-hover">
                            <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                {{--<th> {!! get_title_search('id_',$id) !!} </th>--}}
                                <th> {!! get_title_search('name',$name) !!}  </th>
                                <th> {!! get_title_search('phone',$phone) !!}  </th>
                                <th> {!! get_title_search('delivery_date',$delivery_date) !!} </th>
                                <th> {!! get_title_search('delivery_time',$delivery_time) !!}  </th>
                                <th> {!! get_title_search('house_number',$house_number) !!}  </th>
                                <th> {!! get_title_search('road',$road) !!}  </th>
                                <th> {!! get_title_search('sangkat',$sangkat) !!}  </th>
                                <th> {!! get_title_search('khan',$khan) !!}  </th>
                                <th> {!! get_title_search('province_city',$province_city) !!}  </th>
                                <th></th>

                            </tr>
                            <tr>
                                <th> No. </th>
                                <th> {{ _t('order#') }} </th>
                                <th> {{ _t('name') }} </th>
                                <th> {{ _t('phone') }} </th>
                                <th> {{ _t('delivery_date') }} </th>
                                <th> {{ _t('delivery_time') }} </th>
                                <th> {{ _t('house_number') }} </th>
                                <th> {{ _t('road') }} </th>
                                <th> {{ _t('sangkat') }} </th>
                                <th> {{ _t('khan') }} </th>
                                <th> {{ _t('province_city') }} </th>
                                <th style="width: 9px;"> </th>
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
                                    <td class="hidden-xs"> {!! highlight($row->id,$id) !!} </td>
                                    <td class="hidden-xs"> {!! highlight($row->name,$name) !!} </td>
                                    <td class="hidden-xs"> {!! highlight($row->phone,$phone) !!} </td>
                                    <td class="hidden-xs"> {!! highlight($row->delivery_date,$delivery_date) !!} </td>
                                    <td class="hidden-xs"> {!! highlight($row->delivery_time,$delivery_time) !!} </td>
                                    <td class="hidden-xs"> {!! highlight($row->house_number,$house_number) !!} </td>
                                    <td class="hidden-xs"> {!! highlight($row->road,$road) !!} </td>
                                    <td class="hidden-xs"> {!! highlight($row->sangkat,$sangkat) !!} </td>
                                    <td class="hidden-xs"> {!! highlight($row->khan,$khan) !!} </td>
                                    <td class="hidden-xs"> {!! highlight($row->province_city,$province_city) !!} </td>
                                    <td>
                                        <a href="{{url('/backend/view-order').'/'.$row->id}}"
                                           class="btn btn-icon-only yellow"><i
                                                    class="fa fa-eye"></i>
                                        </a>
                                        @if($row->paid-0==1)
                                            <a data-id="" href="javascript:;"
                                               class="btn btn-icon-only purple  btn-unpaid-option" data-idp="{{$row->id}}">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        @else
                                        @endif
                                    </td>
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
    <script>
        $(function () {

            $('body').delegate('.btn-unpaid-option', 'click', function (e) {
                e.preventDefault();
                if (!confirm('Are you sure Un Paid this??')) {
                    return false;
                } else {
                    var idp = $(this).data('idp');
                    $(this).parent().parent().remove();
                    $.ajax({
                        url: '{{url('/backend/post-unpaid')}}',
                        type: 'POST',
                        dataType: 'json',
                        async: false,
                        data: {
                            rowid_: idp
                        },
                        success: function (data) {
//                            alert(data);
                        },
                        error: function () {
//                            alert('error');
                        }
                    });
                }

            });
        });
    </script>
@endsection
