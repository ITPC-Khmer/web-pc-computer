<?php

namespace App\Models\Report;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

class Sale extends Model
{
    protected $dates = ['date'];
    protected $table = 'orders';
    protected $fillable=[

        'paid',
        'cancel',
        'delivery_date',
        'total_qty',
        'sub_total',
        'tax',
        'total_price',
    ];
    public $timestamps=false;
    static function getPaginateSearchOrderPaid($request)
    {
        $page = session('page')?session('page'):$request->page;
        if(session('page')) {
            Paginator::currentPageResolver(function () use ($page) {
                return $page;
            });
        }
        $q['id'] = $request->id;
        $q['total_qty'] = $request->total_qty;
        $q['sub_total'] = $request->sub_total;
        $q['tax'] = $request->tax;
        $q['total_price'] = $request->total_price;
        $q['delivery_date'] = $request->delivery_date;
        $q['delivery_time'] = $request->delivery_time;
        $q['name'] = $request->name;
        $q['phone'] = $request->phone;


        $_result = DB::table('users')->join('orders','users.id','orders.user_id')
            ->select('users.*','orders.id','orders.paid','orders.delivery_date','orders.delivery_time'
                ,'orders.total_qty'
                ,'orders.sub_total'
                ,'orders.tax'
                ,'orders.total_price')
            ->where('paid','1');

        foreach ($q as $k=>$v)
        {
            $_result->where(function($w) use ($k,$v) {
                $searchWords = preg_split('/\s+/', $v);// explode(' ', $v);
                foreach($searchWords as $word){
                    if(trim($word) != '') {
                        $w->orWhere($k, 'LIKE', '%' . $word . '%');
                    }
                }
            });
        }
        $result = $_result->orderBy('orders.id', 'DESC')
            ->paginate(PageLimit);

        foreach ($q as $k=>$v)
        {
            if(trim($v) != '')
            {
                $result->appends($k,$v);
            }
        }

        return array_merge(['result' => $result],$q,['page' => $page]);
    }
    static function getPaginateSearchOrderCancel($request)
    {
        $page = session('page')?session('page'):$request->page;
        if(session('page')) {
            Paginator::currentPageResolver(function () use ($page) {
                return $page;
            });
        }
        $q['id'] = $request->id;
        $q['total_qty'] = $request->total_qty;
        $q['sub_total'] = $request->sub_total;
        $q['tax'] = $request->tax;
        $q['total_price'] = $request->total_price;
        $q['delivery_date'] = $request->delivery_date;
        $q['delivery_time'] = $request->delivery_time;
        $q['name'] = $request->name;
        $q['phone'] = $request->phone;


        $_result = DB::table('users')->join('orders','users.id','orders.user_id')
            ->select('users.*','orders.id','orders.cancel','orders.delivery_date','orders.delivery_time'
                ,'orders.total_qty'
                ,'orders.sub_total'
                ,'orders.tax'
                ,'orders.total_price')
            ->where('cancel','1');

        foreach ($q as $k=>$v)
        {
            $_result->where(function($w) use ($k,$v) {
                $searchWords = preg_split('/\s+/', $v);// explode(' ', $v);
                foreach($searchWords as $word){
                    if(trim($word) != '') {
                        $w->orWhere($k, 'LIKE', '%' . $word . '%');
                    }
                }
            });
        }
        $result = $_result->orderBy('orders.id', 'DESC')
            ->paginate(PageLimit);

        foreach ($q as $k=>$v)
        {
            if(trim($v) != '')
            {
                $result->appends($k,$v);
            }
        }

        return array_merge(['result' => $result],$q,['page' => $page]);
    }
}
