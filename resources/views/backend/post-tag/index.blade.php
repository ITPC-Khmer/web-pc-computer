@php
    $title = isset($title)?$title:'';
    $description = isset($description)?$description:'';
    $status = isset($status)?$status:'';
    $page = isset($page)?$page:1;
@endphp
@extends('layouts.admin-list')

@section('title',_t('Post Tag'))

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-bell-o"></i>{{ _t('Post Tag') }} </div>
                    <div class="tools">
                        <a href="javascript:" class="collapse"> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-scrollable table-responsive">
                        <table class="table table-striped table-bordered table-advance table-hover">
                            <thead>
                            <tr>
                                <th  style="width: 160px;"></th>
                                <th> </th>
                                <th> {!! get_title_search('title',$title) !!} </th>
                                <th> {!! get_title_search('description',$description) !!}  </th>
                                <th style="width: 180px;"> {!! get_title_search_status($status) !!}  </th>
                                <th></th>
                            </tr>
                            <tr>
                                <th style="width: 160px;">  <a href="{{ url('/backend/post-tag-form') }}" class="btn btn-outline btn-circle btn-sm purple">
                                        <i class="fa fa-plus"></i> Add </a> </th>
                                <th> No. </th>
                                <th> {{ _t('title') }} </th>
                                <th> {{ _t('description') }} </th>
                                <th> {{ _t('status') }} </th>
                                <th style="width: 160px;">{{ _t('Create Date') }}</th>
                            </tr>

                            </thead>
                            <tbody>
                            @php
                                $count = 1;
                            @endphp
                            @foreach ($result as $row)
                                <tr>
                                    <td>
                                        {!! Form::open(['url' => "/backend/post-tag-form", 'method' => 'put']) !!}
                                        {!! Form::hidden('id',$row->id) !!}
                                        {!! Form::hidden('_page',$page) !!}

                                        <button type="submit" class="btn btn-outline btn-circle btn-sm purple">
                                            <i class="fa fa-edit"></i> {{ _t('Edit') }} </button>
                                        <a data-href="{{ url('/backend/post-tag-delete') }}" data-id="{{  $row->id }}" href="javascript:" class="btn btn-outline btn-circle dark btn-sm black vm-del">
                                            <i class="fa fa-trash-o"></i> {{ _t('Delete') }} </a>
                                        {!! Form::close() !!}
                                    </td>
                                    <td class="highlight">
                                        <a href="javascript:"> {{ (($result->currentPage()-1)*$result->perPage())+$count++ }} </a>
                                    </td>
                                    <td class="hidden-xs"> {!! highlight($row->title,$title) !!} </td>
                                    <td class="hidden-xs"> {!! highlight($row->description,$description) !!} </td>
                                    {{--<td class="hidden-xs">{{ status()[$row->status] }}</td>--}}
                                    <td class="hidden-xs">
                                        {!! Form::select('status',status(),$row->status,['class'=>"form-control status-ch",'data-id'=> $row->id,
                                        'data-url'=> url("/backend/post-tag-update-status")]) !!}
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