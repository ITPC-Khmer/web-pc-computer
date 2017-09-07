@php
    $key = isset($key)?$key:'';
    $title = isset($title)?$title:'';
    $key_type = isset($key_type)?$key_type:'';
    $page = isset($page)?$page:1;
@endphp
@extends('layouts.admin-list')

@section('title',_t('Web Setting Page'))

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-bell-o"></i>{{ _t('Web Setting List') }} </div>
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
                                <th>  </th>
                                <th> {!! get_title_search('key',$key) !!} </th>
                                <th> {!! get_title_search('title',$title) !!}  </th>
                                <th style="width: 180px;"> {!! get_title_search($key_type) !!}  </th>
                                <th></th>
                            </tr>
                            <tr>
                                <th style="width: 98px;">  <a href="{{ url('/backend/web-setting-form') }}" class="btn btn-icon-only green">
                                        <i class="fa fa-plus"></i></a> </th>
                                <th> No. </th>
                                <th> {{ _t('key') }} </th>
                                <th> {{ _t('title') }} </th>
                                <th> {{ _t('key_type') }} </th>
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
                                        {!! Form::open(['url' => "/backend/web-setting-form", 'method' => 'put']) !!}
                                        {!! Form::hidden('id',$row->id) !!}
                                        {!! Form::hidden('_page',$page) !!}

                                        <button type="submit" class="btn btn-icon-only purple">
                                            <i class="fa fa-edit"></i></button>
                                        <a data-href="{{ url('/backend/web-setting-form-delete') }}" data-id="{{  $row->id }}" href="javascript:" class="btn btn-icon-only red vm-del">
                                            <i class="fa fa-trash-o"></i></a>
                                        {!! Form::close() !!}
                                    </td>


                                    <td class="highlight">
                                        <a href="javascript:"> {{ (($result->currentPage()-1)*$result->perPage())+$count++ }} </a>
                                    </td>
                                    <td class="hidden-xs"> {!! highlight($row->key,$key) !!} </td>



                                    <td class="hidden-xs"> {!! highlight($row->title,$title) !!} </td>
                                    <td class="hidden-xs"> {!! highlight($row->key_type,$key_type) !!} </td>
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