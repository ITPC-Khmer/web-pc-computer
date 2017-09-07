@if(count($rows) > 0)
<div id="report-print">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 10px; margin-top: 10px;">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 " style="text-align: center;">
            <img src="{{asset('/front/image/logo/logo_one.png')}}" width="90" height="90" alt="">
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="text-align: center;">
            <span style="font-size: 24px;"><b>ក្រុមហ៊ុន ខៀវសំអាង ត្រេឌីង</b></span><br>
            <span style="font-size: 18px;"><b>{{_t('PROMOTION LIST')}}</b></span>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">

        </div>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <table class="table table-bordered" style="width: 100%;">
            <thead>
            <tr style="font-size: 14px;">
                <th class="text-center" style="width: 25px">#</th>
                <th class="text-center">{{_t('Category Name')}}</th>
                <th class="text-center">{{_t('Code')}}</th>
                <th class="text-center">{{_t('Name')}}</th>
                <th class="text-center">{{_t('Price')}}</th>
                <th class="text-center">{{_t('Promotion Price')}}</th>
                <th class="text-center">{{_t('Expire Date')}}</th>
                <th class="text-center">{{_t('Qty')}}</th>
                <th class="text-center">{{_t('Promotion Amount')}}</th>
            </tr>
            </thead>
            <tbody>
            @php
                $count = 1;
            @endphp
                @foreach($rows as $row)
                    <tr style="font-size: 12px;">
                        <td class="text-left">{{ (($rows->currentPage()-1)*$rows->perPage())+$count++ }}.</td>
                        <td class="text-left">{{$row->category->title}}</td>
                        <td class="text-center">{{$row->item_code}}</td>
                        <td class="text-left">{{$row->title}}</td>
                        <td class="text-right">$ {{$row->start_price}}</td>
                        <td class="text-right">$ {{$row->promotion_price}}</td>
                        <td class="text-right">$ {{$row->expire_date}}</td>
                        <td class="text-right"> {{$row->amount}}</td>
                        <td class="text-right">$ {{($row->start_price)-($row->promotion_price)}}</td>
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