@php
    $id = isset($id)?$id:'';
    $user_name = isset($user_name)?$user_name:'';
    $user_phone = isset($user_phone)?$user_phone:'';
    $user_house_number = isset($user_house_number)?$user_house_number:'';
    $user_road = isset($user_road)?$user_road:'';
    $user_sangkat = isset($user_sangkat)?$user_sangkat:'';
    $user_khan = isset($user_khan)?$user_khan:'';
    $user_province_city = isset($user_province_city)?$user_province_city:'';
    $page = isset($page)?$page:1;
@endphp

@extends('layouts.admin-list')

@section('title',_t('All Orders Page'))

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-bell-o"></i>{{ _t('All Order List') }} </div>
                    <div class="tools">
                        <a href="javascript:" class="collapse"> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-scrollable table-responsive">
                        <table class="table table-striped table-bordered table-advance table-hover" >
                            <thead>
                            <tr>
                                <th>  </th>
                                <th>  </th>
                                <th> {!! get_title_search('user_name',$user_name) !!} </th>
                                <th> {!! get_title_search('user_phone',$user_phone) !!} </th>
                                <th> {!! get_title_search('user_house_number',$user_house_number) !!} </th>
                                <th> {!! get_title_search('user_road',$user_road) !!} </th>
                                <th> {!! get_title_search('user_sangkat',$user_sangkat) !!} </th>
                                <th> {!! get_title_search('user_khan',$user_khan) !!} </th>
                                <th> {!! get_title_search('user_province_city',$user_province_city) !!} </th>
                                <th></th>
                            </tr>
                            <tr>
                                <th> No. </th>
                                <th> {{ _t('order#') }} </th>
                                <th> {{ _t('name') }} </th>
                                <th> {{ _t('phone') }} </th>
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
                                    <td class="hidden-xs"> {!! highlight($row->user_name,$user_name) !!} </td>
                                    <td class="hidden-xs"> {!! highlight($row->user_phone,$user_phone) !!} </td>
                                    <td class="hidden-xs"> {!! highlight($row->user_house_number,$user_house_number) !!} </td>
                                    <td class="hidden-xs"> {!! highlight($row->user_road,$user_road) !!} </td>
                                    <td class="hidden-xs"> {!! highlight($row->user_sangkat,$user_sangkat) !!} </td>
                                    <td class="hidden-xs"> {!! highlight($row->user_khan,$user_khan) !!} </td>
                                    <td class="hidden-xs"> {!! highlight($row->user_province_city,$user_province_city) !!} </td>
                                    <td class="hidden-xs">
                                        @if($row->cancel==0 and $row->paid==0)
                                            <span class="label label-sm label-success">{{_t('pending')}}</span>
                                        @elseif($row->cancel==1)
                                            <span class="label label-sm label-info">{{_t('cancel')}}</span>
                                        @endif
                                        @if($row->paid==1)
                                            <span class="label label-sm label-danger">{{_t('paid')}}</span>
                                        @endif

                                    </td>
                                    <td>
                                        <a href="{{url('/backend/view-order').'/'.$row->id}}"
                                           class="btn btn-icon-only yellow"><i
                                                    class="fa fa-eye"></i>
                                        </a>
                                        @if($row->paid==0 and $row->cancel==0)
                                            <a type="submit" class="btn btn-icon-only green btn-paid-option" data-idp="{{$row->id}}">
                                                <i class="fa fa-usd"></i>
                                            </a>
                                        @endif
                                        @if($row->cancel==0 and $row->paid==0)
                                            <a data-id="" href="javascript:;"
                                               class="btn btn-icon-only purple btn-cancel-option" data-idc="{{$row->id}}">
                                                <i class="fa fa-trash-o"></i>
                                            </a>
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
        //        $(".action-btn-cancel-paid").DataTable();
        $(function () {
            $('body').delegate('.btn-cancel-option','click',function (e) {
                e.preventDefault();
                if(!confirm('Are you sure Cancel this??')){
                    return false;
                }else {
                    var idc =$(this).data('idc');
                    $(this).parent().parent().remove();
                    $.ajax({
                        url: '{{url('/backend/post-cancel')}}',
                        type: 'POST',
                        dataType: 'json',
                        async: false,
                        data:{
                            rowid: idc,
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

            $('body').delegate('.btn-paid-option','click',function (e) {
                e.preventDefault();
                if(!confirm('Are you sure Paid this??')){
                    return false;
                }else {
                    var idp =$(this).data('idp');
                    $(this).parent().parent().remove();
                    $.ajax({
                        url: '{{url('/backend/post-paid')}}',
                        type: 'POST',
                        dataType: 'json',
                        async: false,
                        data:{
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