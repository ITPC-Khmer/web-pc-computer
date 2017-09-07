<?php

namespace App\Models\Backend;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    protected $table ='orders';

    public function customer()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    static function getPaginateSearch($request)
    {

        $page = session('page')?session('page'):$request->page;
        if(session('page')) {
            Paginator::currentPageResolver(function () use ($page) {
                return $page;
            });
        }
        $q['id'] = $request->id;
        $q['user_name'] = $request->user_name;
        $q['user_phone'] = $request->user_phone;
        $q['user_house_number'] = $request->user_house_number;
        $q['user_road'] = $request->user_road;
        $q['user_sangkat'] = $request->user_sangkat;
        $q['user_khan'] = $request->user_khan;
        $q['user_province_city'] = $request->user_location_type;

        $_result = Order::select('orders.*',DB::raw('users.name as user_name, users.phone as user_phone , 
         users.house_number as user_house_number ,users.road as user_road,
         users.sangkat as user_sangkat , users.khan as user_khan , users.province_city as user_province_city'));


        foreach ($q as $k=>$v)
        {
            $_result->where(function($w) use ($k,$v) {
                $searchWords = preg_split('/\s+/', $v);// explode(' ', $v);
                foreach($searchWords as $word){
                    if(trim($word) != '') {
                        if ($k=='id'){
                            $w->orWhere('orders.'.$k, 'LIKE', '%' . $word . '%');
                        }else{
                            $w->orWhere('users.'.str_replace('user_','',$k), 'LIKE', '%' . $word . '%');
                        }
                    }
                }
            });
        }
//        ($k=='role_title'?'roles.title':'admins.'.$k)
        $result = $_result->join('users', 'orders.user_id', '=', 'users.id')->orderBy('orders.id', 'DESC')
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

    static function getPaginateSearchNew($request)
    {
        $page = session('page')?session('page'):$request->page;
        if(session('page')) {
            Paginator::currentPageResolver(function () use ($page) {
                return $page;
            });
        }
        $q['id'] = $request->id;
        $q['delivery_date'] = $request->delivery_date;
        $q['delivery_time'] = $request->delivery_time;
        $q['name'] = $request->name;
        $q['phone'] = $request->phone;
        $q['house_number'] = $request->house_number;
        $q['road'] = $request->road;
        $q['sangkat'] = $request->sangkat;
        $q['khan'] = $request->khan;
        $q['province_city'] = $request->province_city;
//        $q['direction_guide'] = $request->location_type;


        $_result = DB::table('users')->join('orders','users.id','orders.user_id')
            ->select('users.*','orders.id','orders.delivery_date','orders.delivery_time')
            ->where('cancel','!=',1)
            ->orWhere('paid','!=',1);

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

    static function getPaginateSearchPaid($request)
    {
        $page = session('page')?session('page'):$request->page;
        if(session('page')) {
            Paginator::currentPageResolver(function () use ($page) {
                return $page;
            });
        }
        $q['id'] = $request->id;
        $q['delivery_date'] = $request->delivery_date;
        $q['delivery_time'] = $request->delivery_time;
        $q['name'] = $request->name;
        $q['phone'] = $request->phone;
        $q['house_number'] = $request->house_number;
        $q['road'] = $request->road;
        $q['sangkat'] = $request->sangkat;
        $q['khan'] = $request->khan;
        $q['province_city'] = $request->province_city;
//        $q['direction_guide'] = $request->location_type;


        $_result = DB::table('users')->join('orders','users.id','orders.user_id')
            ->select('users.*','orders.id','orders.paid','orders.delivery_date','orders.delivery_time')
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

    static function getPaginateSearchCancel($request)
    {
        $page = session('page')?session('page'):$request->page;
        if(session('page')) {
            Paginator::currentPageResolver(function () use ($page) {
                return $page;
            });
        }
        $q['id'] = $request->id;
        $q['delivery_date'] = $request->delivery_date;
        $q['delivery_time'] = $request->delivery_time;
        $q['name'] = $request->name;
        $q['phone'] = $request->phone;
        $q['house_number'] = $request->house_number;
        $q['road'] = $request->road;
        $q['sangkat'] = $request->sangkat;
        $q['khan'] = $request->khan;
        $q['province_city'] = $request->province_city;
//        $q['direction_guide'] = $request->location_type;


        $_result = DB::table('users')->join('orders','users.id','orders.user_id')
            ->select('users.*','orders.id','orders.cancel','orders.delivery_date','orders.delivery_time')
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
