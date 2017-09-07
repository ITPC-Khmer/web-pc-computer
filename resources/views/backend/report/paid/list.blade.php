@if(count($rows) > 0)
<div id="report-print">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 10px; margin-top: 10px;">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 " style="text-align: center;">
            <img src="{{asset('/front/image/logo/logo_one.png')}}" width="90" height="90" alt="">
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="text-align: center;">
            <span style="font-size: 24px;"><b>ក្រុមហ៊ុន ខៀវសំអាង ត្រេឌីង</b></span><br>
            <span style="font-size: 18px;"><b>{{_t('PAID ORDER LIST')}}</b></span>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">

        </div>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <table class="table table-bordered" style="width: 100%;">
            <thead>
            <tr style="font-size: 14px;">
                <th class="text-center" style="width: 20px">#</th>
                <th class="text-center">{{_t('Invoice Number')}}</th>
                <th class="text-center">{{_t('Delivery Date')}}</th>
                <th class="text-center">{{_t('Delivery Time')}}</th>
                <th class="text-center">{{_t('Customer Name')}}</th>
                <th class="text-center">{{_t('Total Quantity')}}</th>
                <th class="text-center">{{_t('Sub Total')}}</th>
                <th class="text-center">{{_t('Tax')}}</th>
                <th class="text-center">{{_t('Grand Total')}}</th>
                <th class="text-center">{{_t('Sale Process')}}</th>

            </tr>
            </thead>
            <tbody>
            @php
                $count = 1;
            @endphp
                @foreach($rows as $row)
                    <tr style="font-size: 12px;">
                        <td class="text-left">{{ (($rows->currentPage()-1)*$rows->perPage())+$count++ }}.</td>
                        <td class="text-left">#{{$row->invoice_id}}</td>
                        <td class="text-center">{{$row->delivery_date}}</td>
                        <td class="text-center">{{$row->delivery_time}}</td>
                        <td class="text-left">{{$row->customer->name}}</td>
                        <td class="text-right">{{$row->total_qty}}</td>
                        <td class="text-right">$ {{$row->sub_total}}</td>
                        <td class="text-right">$ {{$row->tax}}</td>
                        <td class="text-right">$ {{$row->total_price}}</td>
                        <td class="text-center">@if(($row->paid) != 0 ) <b style="color: green;">{{_t('Paid')}}</b> @endif </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 my-paginate" style="text-align: center;">
    {!! $rows->links() !!}
</div>
@else
    <h2 align="center">{{_t('Not Record Found')}}</h2>

@endif