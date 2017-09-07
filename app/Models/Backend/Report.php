<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;

class Report extends Model
{

    static function saleItemReport($request,$limit=30)
    {
        $from_date = $request->from_date;
        $to_date = $request->to_date;
        $q = $request->q;
        $m = Order::whereBetween('delivery_date', array($from_date, $to_date));

        if ($q != null && $q != ''){
            $m->where(function ($query) use($q){
                $query->where('invoice_id','like',"%{$q}%")
                    ->orWhere('delivery_date','like',"%{$q}%")
                    ->orWhere('total_qty','like',"%{$q}%")
                    ->orWhere('total_price','like',"%{$q}%")
                ;
            });
        }
        return $m->orderBy('id','ASC')->paginate($limit);
    }

    static function promotionExpireReport($request,$limit=30)
    {
        $from_date = $request->from_date;
        $to_date = $request->to_date;
        $q = $request->q;
        $m = Item::where('promotion_price','!=', null)->whereBetween('expire_date', array($from_date, $to_date));

        if ($q != null && $q != ''){
            $m->where(function ($query) use($q){
                $query->where('item_code','like',"%{$q}%")
                    ->orWhere('title','like',"%{$q}%")
                    ->orWhere('start_price','like',"%{$q}%")
                    ->orWhere('promotion_price','like',"%{$q}%")
                    ->orWhere('amount','like',"%{$q}%")
                ;
            });
        }
        return $m->orderBy('id','ASC')->paginate($limit);
    }

    static function orderPaidReport($request,$limit=30)
    {
        $from_date = $request->from_date;
        $to_date = $request->to_date;
        $q = $request->q;
        $m = Order::where('paid','=', 1)->whereBetween('delivery_date', array($from_date, $to_date));

        if ($q != null && $q != ''){
            $m->where(function ($query) use($q){
                $query->where('invoice_id','like',"%{$q}%")
                    ->orWhere('delivery_date','like',"%{$q}%")
                    ->orWhere('total_qty','like',"%{$q}%")
                    ->orWhere('total_price','like',"%{$q}%")
                ;
            });
        }
        return $m->orderBy('id','ASC')->paginate($limit);
    }

    static function orderCancelReport($request,$limit=30)
    {
        $from_date = $request->from_date;
        $to_date = $request->to_date;
        $q = $request->q;
        $m = Order::where('cancel','=', 1)->whereBetween('delivery_date', array($from_date, $to_date));

        if ($q != null && $q != ''){
            $m->where(function ($query) use($q){
                $query->where('invoice_id','like',"%{$q}%")
                    ->orWhere('delivery_date','like',"%{$q}%")
                    ->orWhere('total_qty','like',"%{$q}%")
                    ->orWhere('total_price','like',"%{$q}%")
                ;
            });
        }
        return $m->orderBy('id','ASC')->paginate($limit);
    }
    static function orderPendingReport($request,$limit=30)
    {
        $from_date = $request->from_date;
        $to_date = $request->to_date;
        $q = $request->q;
        $m = Order::where('cancel','!=', 1)
            ->orWhere('paid','!=',1)
            ->whereBetween('delivery_date', array($from_date, $to_date));

        if ($q != null && $q != ''){
            $m->where(function ($query) use($q){
                $query->where('invoice_id','like',"%{$q}%")
                    ->orWhere('delivery_date','like',"%{$q}%")
                    ->orWhere('total_qty','like',"%{$q}%")
                    ->orWhere('total_price','like',"%{$q}%")
                ;
            });
        }
        return $m->orderBy('id','ASC')->paginate($limit);
    }
}
