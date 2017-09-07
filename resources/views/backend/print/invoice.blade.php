@extends('layouts.admin-list')

@section('title',_t('Item Page'))

@section('content')
    <link href="{{ $base_url }}assets/pages/css/invoice.min.css" rel="stylesheet" type="text/css" />
    @if(is_m())
    <div class="page-content">
    @endif
        <div class="page-container">
            <h1 class="page-title"><b>{{_t('INVOICE')}}: #{{$get_invoice->invoice_id}}</b>
            </h1>
            <div class="invoice">
                <div class="row invoice-logo">
                    <div class="col-xs-6 invoice-logo-space">
                        <img src="{{ $base_url }}assets/pages/media/invoice/walmart.png" class="img-responsive" alt="" /> </div>
                    <div class="col-xs-6">
                        <p> <b>{{_t('ORDER ID')}} : #{{$get_invoice->id}}</b>
                            <span class="muted">  </span>
                        </p>
                    </div>
                </div>
                <hr/>
                <div class="row">
                    <div class="col-xs-4">
                        <h3>{{_t('Bill To')}}:</h3>
                        <ul class="list-unstyled">
                            <li> <strong>{{_t('Name')}}: </strong>{{$get_invoice->name}} </li>
                            <li> <strong>{{_t('Email')}}: </strong>{{$get_invoice->email}} </li>
                            <li> <strong>{{_t('Tel')}}: </strong>  {{$get_invoice->phone}}</li>
                        </ul>
                    </div>
                    <div class="col-xs-4">
                        <h3>{{_t('Ship To')}}:</h3>
                        <ul class="list-unstyled">
                            <li> {{$get_invoice->house_number}},{{$get_invoice->road}},{{$get_invoice->sangkat}}, </li>
                            <li> {{$get_invoice->khan}}, </li>
                            <li> {{$get_invoice->province_city}}, </li>
                            <li> {{$get_invoice->direction_guide}} </li>
                        </ul>
                    </div>
                    <div class="col-xs-4 invoice-payment">
                        <h3>{{_t('Due Date')}}:</h3>
                        <ul class="list-unstyled">
                            <li> <strong>{{_t('Date')}}: </strong>{{$get_invoice->delivery_date}}</li>
                            <li> <strong>{{_t('Time')}}: </strong>{{$get_invoice->delivery_time}}</li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th> {{_t('Code')}}#</th>
                                <th> {{_t('Name')}}</th>
                                <th> {{_t('Image')}}</th>
                                <th>{{_t('Quantity')}}</th>
                                <th> {{_t('Unit Cost')}} </th>
                                <th> {{_t('Total')}} </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(json_decode($get_invoice->order_detail) as $item)
                                <tr>
                                    <td> {{$item->options->code}} </td>
                                    <td> {{$item->name}}</td>
                                    <td> <img src="{{$item->options->image}}" style="width: 50px; height: 50px;"> </td>
                                    <td> {{$item->qty}} </td>
                                    <td> $ {{$item->price}} </td>
                                    <td> $ {{$item->price*$item->qty}} </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row">
                            <div class="col-xs-4">
                                <div class="well">
                                    <address>
                                        <strong>{{_t('khiev sam ang trading co.,ltd')}}</strong>
                                        <br/>
                                        {{ \App\Models\Backend\WebSetting::getSetting('address')}}
                                        <br/>
                                        <abbr title="Phone">Tel:</abbr> {{ \App\Models\Backend\WebSetting::getSetting('phone')}}</address>
                                    <address>
                                        <strong>{{_t('Email')}}</strong>
                                        <br/>
                                        <a href="mailto:#">{{ \App\Models\Backend\WebSetting::getSetting('email')}}</a>
                                    </address>
                                </div>
                            </div>


                            <div class="col-xs-8 invoice-block">
                                <ul class="list-unstyled amounts">
                                    <li>
                                        <strong>{{_t('Total Qty')}}:</strong> {{$get_invoice->total_qty}} {{_t('items_')}} </li>
                                    <li>
                                        <strong>{{_t('Sub Total')}}:</strong> $ {{$get_invoice->sub_total}} </li>
                                    <li>
                                        <strong>{{_t('TAX(0%)')}}:</strong> $ {{$get_invoice->tax}}</li>
                                    <li>
                                        <strong>{{_t('Grand Total')}}:</strong> $ {{$get_invoice->total_price}}</li>
                                </ul>
                                <br/>
                                <a href="{{url('/backend/all-order')}}" class="btn btn-lg green hidden-print margin-bottom-5"> {{_t('Back')}}
                                    <i class="fa fa-times"></i>
                                </a>
                                <a class="btn btn-lg red hidden-print margin-bottom-5" onclick="javascript:window.print();"> {{_t('Print')}}
                                    <i class="fa fa-print"></i>
                                </a>

                        </div>
                    </div>
            </div>
        </div>
    @if(is_m())
    </div>
    @endif
    <style>
        .table thead tr th {
            background-color: #337ab7;
            font-size: 14px;
            font-weight: 400;
            color: #FFFFFF;
        }
    </style>
@endsection
@section('script')
    @parent

@endsection

