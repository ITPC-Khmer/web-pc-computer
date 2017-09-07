<?php

namespace App\Http\Controllers\Report;

use App\Models\Backend\Item;
use App\Models\Backend\Order;
use App\Models\Backend\Report;
use App\Models\Report\Sale;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class SaleController extends Controller
{
    function orderPaid(Request $request){
         return view('report.sale',Sale::getPaginateSearchOrderPaid($request));
    }
    function orderCancel(Request $request){
         return view('report.sale',Sale::getPaginateSearchOrderCancel($request));
    }
    function saleTblReport(Request $request){
        $key=1;
        $from_date = isset($request->from_date)?$request->from_date:Carbon::now()->format('Y-m-d');
        $to_date = isset($request->to_date)?$request->to_date:Carbon::now()->format('Y-m-d');
        $RepAllBranch = Sale::selectRaw('paid,SUM(total_qty) as sum_total_qty,SUM(sub_total) as sum_sub_total,
        SUM(tax) as sum_tax,SUM(total_price) as sum_total_price,')
            ->whereDate('delivery_date','>=', $from_date)
            ->whereDate('delivery_date','<=',$to_date)
            ->groupBy('paid')->get();

        if(count($RepAllBranch) == 0 && $request->from_date == null)
        {
            $lastDate = Sale::select('delivery_date')->orderBy('delivery_date','desc')->limit(1)->first();

            if(isset($lastDate->date)) {
                $RepAllBranch = Sale::selectRaw('paid,SUM(total_qty) as sum_total_qty,SUM(sub_total) as sum_sub_total,
                SUM(tax) as sum_tax,SUM(total_price) as sum_total_price,')
                    ->whereDate('delivery_date', '=', $lastDate->date->format('Y-m-d'))
                    ->groupBy('paid')->get();

                $from_date = $lastDate->date->format('Y-m-d');
                $to_date = $lastDate->date->format('Y-m-d');
            }
        }
        return view('report.sale_tbl_report',
        [
            'from_date'=>$from_date,
            'to_date'=>$to_date,
            'tbl_all_reports'=>$RepAllBranch,
            'key'=>$key
        ]);
    }

    function tableReport(){

        return view('backend.report.table');
    }
//================report search
    function saleReportList(Request $request){
        $key = 1;
        $from_date = $request->from_date;
        $to_date = $request->to_date;
        $q = $request->q;
        $rows = Report::saleItemReport($request);
        $rows->appends([
            'from_date'=>$from_date,
            'to_date'=>$to_date,
            'q'=>$q
        ]);

        return view('backend.report.order.list',['rows'=>$rows, 'key'=>$key]);
    }

    function saleReportDetail(Request $request){
        $key = 1;
        $from_date = $request->from_date;
        $to_date = $request->to_date;
        $q = $request->q;
        $rows = Report::saleItemReport($request);
        $rows->appends([
            'from_date'=>$from_date,
            'to_date'=>$to_date,
            'q'=>$q
        ]);

        return view('backend.report.order.detail',['rows'=>$rows,'key'=>$key]);
    }


    function promotionExpireList(Request $request){
        $key = 1;
        $from_date = $request->from_date;
        $to_date = $request->to_date;
        $q = $request->q;
        $rows = Report::promotionExpireReport($request);
        $rows->appends([
            'from_date'=>$from_date,
            'to_date'=>$to_date,
            'q'=>$q
        ]);

        return view('backend.report.promotion-expire.list',['rows'=>$rows, 'key'=>$key]);
    }





    function orderPaidList(Request $request){
        $key = 1;
        $from_date = $request->from_date;
        $to_date = $request->to_date;
        $q = $request->q;
        $rows = Report::orderPaidReport($request);
        $rows->appends([
            'from_date'=>$from_date,
            'to_date'=>$to_date,
            'q'=>$q
        ]);

        return view('backend.report.paid.list',['rows'=>$rows, 'key'=>$key]);
    }



    function orderPaidDetail(Request $request){
        $key = 1;
        $from_date = $request->from_date;
        $to_date = $request->to_date;
        $q = $request->q;
        $rows = Report::orderPaidReport($request);
        $rows->appends([
            'from_date'=>$from_date,
            'to_date'=>$to_date,
            'q'=>$q
        ]);

        return view('backend.report.paid.detail',['rows'=>$rows,'key'=>$key]);
    }


    function orderCancelList(Request $request){
        $key = 1;
        $from_date = $request->from_date;
        $to_date = $request->to_date;
        $q = $request->q;
        $rows = Report::orderCancelReport($request);
        $rows->appends([
            'from_date'=>$from_date,
            'to_date'=>$to_date,
            'q'=>$q
        ]);

        return view('backend.report.cancel.list',['rows'=>$rows, 'key'=>$key]);
    }

    function orderCancelDetail(Request $request){
        $key = 1;
        $from_date = $request->from_date;
        $to_date = $request->to_date;
        $q = $request->q;
        $rows = Report::orderCancelReport($request);
        $rows->appends([
            'from_date'=>$from_date,
            'to_date'=>$to_date,
            'q'=>$q
        ]);

        return view('backend.report.cancel.detail',['rows'=>$rows,'key'=>$key]);
    }
    function orderPendingList(Request $request){
        $key = 1;
        $from_date = $request->from_date;
        $to_date = $request->to_date;
        $q = $request->q;
        $rows = Report::orderPendingReport($request);
        $rows->appends([
            'from_date'=>$from_date,
            'to_date'=>$to_date,
            'q'=>$q
        ]);

        return view('backend.report.pending.list',['rows'=>$rows,'key'=>$key]);
    }

    function orderPendingDetail(Request $request){
        $key = 1;
        $from_date = $request->from_date;
        $to_date = $request->to_date;
        $q = $request->q;
        $rows = Report::orderPendingReport($request);
        $rows->appends([
            'from_date'=>$from_date,
            'to_date'=>$to_date,
            'q'=>$q
        ]);

        return view('backend.report.pending.detail',['rows'=>$rows,'key'=>$key]);
    }
}