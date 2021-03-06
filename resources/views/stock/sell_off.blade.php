@php
    $item_code = isset($item_code)?$item_code:'';
    $title = isset($title)?$title:'';
    $start_price = isset($start_price)?$start_price:'';
    $promotion_price = isset($promotion_price)?$promotion_price:'';
    $expire_date = isset($expire_date)?$expire_date:'';
    $status = isset($status)?$status:'';
    $instock = isset($instock)?$instock:'';
    $page = isset($page)?$page:1;
@endphp
@extends('layouts.admin-list')

@section('title',_t('Sell Off List'))

@section('content')
    @include('stock.include.top')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-bell-o"></i>{{ _t('Sell Off List') }} </div>
                    <div class="tools">
                        <a href="javascript:" class="collapse"> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-scrollable table-responsive">
                        <table class="table table-striped table-bordered table-advance table-hover">
                            <thead>
                            <tr>
                                <th  style="width: 98px;"></th>
                                <th></th>
                                <th> {!! get_title_search('item_code',$item_code) !!} </th>
                                <th> {!! get_title_search('title',$title) !!} </th>
                                <th> {!! get_title_search('start_price',$start_price) !!}  </th>
                                <th> {!! get_title_search('promotion_price',$promotion_price) !!}  </th>
                                <th> {!! get_title_search('expire_date',$expire_date) !!}  </th>
                                <th style="width: 180px;"> {!! get_title_search_status($status) !!}  </th>
                                <th style="width: 180px;"> {!! get_title_search_instock($instock) !!}  </th>

                            </tr>
                            <tr>
                                <th class="" style="width: 98px;">  <a href="{{ url('/backend/select-category') }}" class="btn btn-icon-only green">
                                        <i class="fa fa-plus"></i></a>
                                </th>

                                {{--<th class="" style="width: 160px;">  <a href="{{ url('/backend/item-form') }}" class="btn btn-outline btn-circle btn-sm purple">--}}
                                {{--<i class="fa fa-plus"></i> Add </a>--}}
                                {{--</th>--}}

                                <th> No. </th>
                                <th> {{ _t('item_code') }} </th>
                                <th> {{ _t('title') }} </th>
                                <th> {{ _t('start_price') }} </th>
                                <th> {{ _t('promotion_price') }} </th>
                                <th> {{ _t('expire_date') }} </th>
                                <th> {{ _t('status') }} </th>
                                <th> {{ _t('instock') }} </th>
                                <th style="width: 98px;">{{ _t('Create Date') }}</th>
                            </tr>

                            </thead>
                            <tbody>
                            @php
                                $count = 1;
                            @endphp
                            @foreach ($result as $row)
                                <tr>
                                    <td>
                                        {!! Form::open(['url' => "/backend/item-form", 'method' => 'put']) !!}
                                        {!! Form::hidden('id',$row->id) !!}
                                        {!! Form::hidden('_page',$page) !!}

                                        <button type="submit" class="btn btn-icon-only purple">
                                            <i class="fa fa-edit"></i></button>
                                        <a data-href="{{ url('/backend/item-delete') }}" data-id="{{  $row->id }}" href="javascript:" class="btn btn-icon-only red vm-del">
                                            <i class="fa fa-trash-o"></i></a>
                                        {!! Form::close() !!}
                                    </td>
                                    <td class="highlight">
                                        <a href="javascript:"> {{ (($result->currentPage()-1)*$result->perPage())+$count++ }} </a>
                                    </td>
                                    <td class="hidden-xs"> {!! highlight($row->item_code,$item_code) !!} </td>
                                    <td class="highlight">
                                        <div class="success"></div>{{ nbs(2) }}
                                        <a href="javascript:"> {!! highlight($row->title,$title) !!} </a>
                                    </td>
                                    <td class="hidden-xs">$ {!! highlight($row->start_price,$start_price) !!} </td>
                                    <td class="hidden-xs">$ {!! highlight($row->promotion_price,$promotion_price) !!} </td>
                                    <td class="hidden-xs">{!! highlight($row->expire_date,$expire_date) !!} </td>
                                    <td class="hidden-xs">
                                        {!! Form::select('status',status(),$row->status,['class'=>"form-control status-ch",'data-id'=> $row->id,
                                        'data-url'=> url("/backend/item-update-status")]) !!}
                                    </td>
                                    <td class="hidden-xs">
                                        {!! Form::select('instock',instock(),$row->instock,['class'=>"form-control status-ch",'data-id'=> $row->id,
                                        'data-url'=> url("/backend/item-update-instock")]) !!}
                                    </td>
                                    <td>{{ $row->created_at }}</td>

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