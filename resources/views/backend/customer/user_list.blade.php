@php
    $name = isset($name)?$name:'';
    $phone = isset($phone)?$phone:'';
    $email = isset($email)?$email:'';
    $page = isset($page)?$page:1;
@endphp
@extends('layouts.admin-list')

@section('title',_t('Customer List Page'))

@section('content')
     <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-bell-o"></i>{{ _t('Customer List') }} </div>
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
                                <th> {!! get_title_search('name',$name) !!} </th>
                                <th> {!! get_title_search('phone',$phone) !!} </th>
                                <th> {!! get_title_search('email',$email) !!}  </th>

                            </tr>
                            <tr>
                                <th> No. </th>
                                <th> {{ _t('name') }} </th>
                                <th> {{ _t('phone') }} </th>
                                <th> {{ _t('email') }} </th>
                                <th style="width: 98px;">{{ _t('Create Date') }}</th>
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
                                    <td class="highlight">
                                        <div class="success"></div>{{ nbs(2) }}
                                        <a href="javascript:"> {!! highlight($row->phone,$phone) !!} </a>
                                    </td>
                                    <td class="hidden-xs"> {!! highlight($row->email,$email) !!} </td>
                                    <td>{{ $row->created_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
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