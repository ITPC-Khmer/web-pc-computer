
@extends('layouts.admin-list')

@section('title', _t('View Order Page'))

@section('content')
    <div class="row">
        <div class=" col-md-12">
            <div class="portlet">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-bell-o"></i>{{ _t('View Order Detail List') }} </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-sm-12">
            <div class="portlet green box">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-cogs"></i>Contact ID: {{$contact_detail->id}}
                    </div>
                    <div class="actions">
                        <a href="{{URL::previous()}}" class="btn btn-default btn-sm" >
                            <i class="fa  backward"></i> Back </a>
                    </div>
                </div>

                <div class="portlet-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-striped">
                            <thead>
                            <tr>
                                <th> Enquiry </th>
                            </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td> {{$contact_detail->enquiry}} </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection