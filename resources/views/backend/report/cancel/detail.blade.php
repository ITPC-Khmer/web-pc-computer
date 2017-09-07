@if(count($rows) > 0)
<div id="report-print">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 10px; margin-top: 10px;">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 " style="text-align: center;">
            <img src="{{asset('/front/image/logo/logo_one.png')}}" width="90" height="90" alt="">
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="text-align: center;">
            <span style="font-size: 24px;"><b>ក្រុមហ៊ុន ខៀវសំអាង ត្រេឌីង</b></span><br>
            <span style="font-size: 18px;"><b>{{_t('CANCEL ORDER DETAIL')}}</b></span>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
        </div>
    </div>
    @foreach($rows as $row)
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="border: solid 1px darkgrey; margin-bottom: 10px;">
            <div style="font-size:14px;">
                <table style="width: 100%; margin-bottom: 10px; margin-top: 10px;">
                    <tbody style="font-size: 14px;">
                    <tr style="text-align:center;">
                        <td style="vertical-align:middle;text-align:left; padding-left:10px;"><span><b>{{_t('Invoice Number')}}</b></span> : #{{$row->invoice_id}}</td>
                        <td style="vertical-align:middle;text-align:left;"><span><b>{{_t('Delivery Date')}}</b></span> : {{$row->delivery_date}}</td>
                    </tr>
                    <tr style="text-align:center;">
                        <td style="vertical-align:middle;text-align:left; padding-left:10px;"><span><b>{{_t('Customer Name')}}</b></span> : {{$row->customer->name}}</td>
                        <td style="vertical-align:middle;text-align:left;"><span><b>{{_t('Delivery Time')}}</b></span> : {{$row->delivery_time}}</td>
                    </tr>
                    <tr style="text-align:center;">
                        <td style="vertical-align:middle;text-align:left; padding-left:10px;"><span><b>{{_t('Sale Process')}}</b></span> :  @if(($row->cancel) != 0 ) <b style="color: #ff7813;">{{_t('Cancel')}}</b> @endif</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <style>
                .no_border_btm tr td{
                    border:none !important;
                }
            </style>
            <table class="table-condensed receipt no_border_btm" style="width:100%;">
                <thead>
                <tr style="border:1px dotted black !important; font-size:14px;">
                    <th class="text-center">{{_t('No')}}</th>
                    <th class="text-center">{{_t('Code')}}</th>
                    <th class="text-center">{{_t('Name')}}</th>
                    <th class="text-center">{{_t('Qty')}}</th>
                    <th class="text-center">{{_t('Price')}}</th>
                    <th class="text-center">{{_t('Amount')}}</th>
                </tr>
                </thead>
                <tbody style="border-bottom:2px solid black; font-size: 12px;">
                    @foreach(json_decode($row->order_detail) as $r)
                    <tr class="item">
                        <td class="text-left">{{$key++}}</td>
                        <td class="text-left">{{$r->options->code}}</td>
                        <td class="text-left">{{$r->name}}</td>
                        <td class="text-right">{{$r->qty}}</td>
                        <td class="text-right">$ {{$r->price}}</td>
                        <td class="text-right">$ {{($r->qty)*($r->price)}}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                </tfoot>
            </table>
            <table style="width: 100%; margin-top: 5px;">
                <tr>
                    <td style="text-align:left;">បរិមាណ</td>
                    <td style="text-align:right;width:35%;">Quantity (Qty) :</td>
                    <td style="text-align:right;"> {{$row->total_qty}} units</td>
                </tr>
                <tr>
                    <td style="text-align:left;">សរុប</td>
                    <td style="text-align:right;">Sub Total (USD) :</td>
                    <td style="text-align:right;">$ {{$row->sub_total}}</td>
                </tr>
                <tr>
                    <td style="text-align:left;">ពន្ធ</td>
                    <td style="text-align:right;">Tax (USD) :</td>
                    <td style="text-align:right;">$ {{$row->tax}}</td>
                </tr>
                {{--<tr>--}}
                    {{--<td style="text-align:left;">បញ្ចុះតំលៃ</td>--}}
                    {{--<td style="text-align:right;width:35%;">Discount (USD) :</td>--}}
                    {{--<td style="text-align:right;">$ </td>--}}
                {{--</tr>--}}
                <tr>
                    <td style="text-align:left;">សរុបចុងក្រោយ</td>
                    <td style="text-align:right;width:40%;">Grand Total (USD) :</td>
                    <td style="text-align:right;">$ {{$row->total_price}}</td>
                </tr>

            </table>
        </div>
    @endforeach
</div>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 my-paginate" style="text-align: center;">
    {!! $rows->links() !!}
</div>
@else
    <h2 align="center">Not Record Found</h2>

@endif