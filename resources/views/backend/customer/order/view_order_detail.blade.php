
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
                        <i class="fa fa-cogs"></i>{{_t('Order ID')}}: {{$order_detail->id}}
                    </div>
                    <div class="actions">
                        <a href="{{URL::previous()}}" class="btn btn-default btn-sm" >
                            <i class="fa  backward"></i> {{_t('Back')}} </a>
                    </div>
                </div>

                <div class="portlet-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-striped">
                            <thead>
                            <tr>
                                <th> {{_t('Code')}} </th>
                                <th> {{_t('Image')}} </th>
                                <th> {{_t('Name')}} </th>
                                <th> {{_t('Color')}}</th>
                                <th> {{_t('Size')}} </th>
                                <th> {{_t('Quantity')}} </th>
                                <th> {{_t('Price')}} </th>
                                <th> {{_t('Total')}} </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(json_decode($order_detail->order_detail) as $item)
                              <tr>
                                <td>
                                    <a href="javascript:;"> {{$item->options->code}} </a>
                                </td>
                                <td>
                                    <a href="javascript:;"> <img src="{{$item->options->image}}" style="width: 50px; height: 50px;"> </a>
                                </td>
                                <td>
                                    <a href="javascript:;"> {{$item->name}} </a>
                                </td>
                                <td> {{$item->options->color}} </td>
                                <td> {{$item->options->size}} </td>
                                <td> {{$item->qty}} </td>
                                <td> $ {{$item->price}} </td>
                                <td> $ {{$item->price*$item->qty}} </td>
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
        <div class="col-md-6"> </div>
        <div class="col-md-6">
            <div class="well">
                <div class="row static-info align-reverse">
                    <div class="col-md-8 name"> {{_t('Total Qty')}}: </div>
                    <div class="col-md-3 value"> {{$order_detail->total_qty}} {{_t('items.')}} </div>
                </div>
                <div class="row static-info align-reverse">
                    <div class="col-md-8 name"> {{_t('Sub Total')}}: </div>
                    <div class="col-md-3 value"> $ {{$order_detail->sub_total}}</div>
                </div>

                <div class="row static-info align-reverse">
                    <div class="col-md-8 name"> {{_t('Delivery Fee')}}: </div>
                    <div class="col-md-3 value"> $ 0.00 </div>
                </div>

                <div class="row static-info align-reverse">
                    <div class="col-md-8 name">{{_t('Tax')}}: </div>
                    <div class="col-md-3 value"> $ {{$order_detail->tax}}</div>
                </div>

                <div class="row static-info align-reverse">
                    <div class="col-md-8 name"> {{_t('Grand Total')}}: </div>
                    <div class="col-md-3 value"> $ {{$order_detail->total_price}} </div>
                </div>
                <div class="row static-info align-reverse">
                    <div class="col-md-8 name"></div>
                    <div class="col-md-3 value">
                        <a href="{{url('/backend/invoice-print').'/'.$order_detail->id}}" class="btn red"> {{_t('Add to Invoice')}}
                            <i class="fa fa-print"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection