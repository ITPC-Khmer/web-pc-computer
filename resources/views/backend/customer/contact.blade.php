@php
    $id = isset($id)?$id:'';
    $username = isset($username)?$username:'';
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
                                <th> </th>
                                <th> {!! get_title_search('id',$id) !!} </th>
                                <th> {!! get_title_search('username',$username) !!} </th>
                                <th> {!! get_title_search('email',$email) !!}  </th>
                                <th></th>

                            </tr>
                            <tr>
                                <th> No. </th>
                                <th> {{ _t('Contact#') }} </th>
                                <th> {{ _t('username') }} </th>
                                <th> {{ _t('email') }} </th>
                                <th style="width: 9px;"></th>
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
                                    <td class="hidden-xs"> {!! highlight($row->username,$username) !!} </td>
                                    <td class="hidden-xs"> {!! highlight($row->email,$email) !!} </td>
                                    <td>
                                        <a href="{{url('/backend/view-contact').'/'.$row->id}}"
                                           class="btn btn-icon-only yellow"><i
                                                    class="fa fa-search"></i>
                                        </a>
                                    </td>
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