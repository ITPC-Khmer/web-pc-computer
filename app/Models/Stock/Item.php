<?php

namespace App\Models\Stock;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;

class Item extends Model
{
    protected $table = 'items';

    static function getPaginateSearchSale($request)
    {
        $page = session('page')?session('page'):$request->page;
        if(session('page')) {
            Paginator::currentPageResolver(function () use ($page) {
                return $page;
            });
        }

        $q['item_code'] = $request->item_code;
        $q['title'] = $request->title;
        $q['amount'] = $request->amount;
        $q['instock'] = $request->instock;
        $q['status'] = $request->status;

        $_result = self::orderBy('id','DESC')->where('instock',1)->where('amount' ,'!=', null);

        foreach ($q as $k=>$v)
        {
            $_result->where(function($w) use ($k,$v) {
                $searchWords = preg_split('/\s+/', $v);// explode(' ', $v);
                foreach($searchWords as $word){
                    if(trim($word) != '') {
                        $w->orWhere($k , 'LIKE', '%' . $word . '%');
                    }
                }
            });
        }

        $result = $_result->paginate(PageLimit);

        foreach ($q as $k=>$v)
        {
            if(trim($v) != '')
            {
                $result->appends($k,$v);
            }
        }
        return array_merge(['result' => $result],$q,['page' => $page]);
    }


    static function getPaginateSearchInStock($request)
    {
        $page = session('page')?session('page'):$request->page;
        if(session('page')) {
            Paginator::currentPageResolver(function () use ($page) {
                return $page;
            });
        }

        $q['item_code'] = $request->item_code;
        $q['title'] = $request->title;
        $q['amount'] = $request->amount;
        $q['instock'] = $request->instock;
        $q['status'] = $request->status;

        $_result = self::orderBy('id','DESC')->where('instock',1);

        foreach ($q as $k=>$v)
        {
            $_result->where(function($w) use ($k,$v) {
                $searchWords = preg_split('/\s+/', $v);// explode(' ', $v);
                foreach($searchWords as $word){
                    if(trim($word) != '') {
                        $w->orWhere($k , 'LIKE', '%' . $word . '%');
                    }
                }
            });
        }

        $result = $_result->paginate(PageLimit);

        foreach ($q as $k=>$v)
        {
            if(trim($v) != '')
            {
                $result->appends($k,$v);
            }
        }
        return array_merge(['result' => $result],$q,['page' => $page]);
    }

    static function getPaginateSearchOutStock($request)
    {
        $page = session('page')?session('page'):$request->page;
        if(session('page')) {
            Paginator::currentPageResolver(function () use ($page) {
                return $page;
            });
        }

        $q['item_code'] = $request->item_code;
        $q['title'] = $request->title;
        $q['amount'] = $request->amount;
        $q['instock'] = $request->instock;
        $q['status'] = $request->status;

        $_result = self::orderBy('id','DESC')->where('instock','!=',1);

        foreach ($q as $k=>$v)
        {
            $_result->where(function($w) use ($k,$v) {
                $searchWords = preg_split('/\s+/', $v);// explode(' ', $v);
                foreach($searchWords as $word){
                    if(trim($word) != '') {
                        $w->orWhere($k , 'LIKE', '%' . $word . '%');
                    }
                }
            });
        }

        $result = $_result->paginate(PageLimit);

        foreach ($q as $k=>$v)
        {
            if(trim($v) != '')
            {
                $result->appends($k,$v);
            }
        }
        return array_merge(['result' => $result],$q,['page' => $page]);
    }

    static function getPaginateSearchSellOff($request)
    {
        $page = session('page')?session('page'):$request->page;
        if(session('page')) {
            Paginator::currentPageResolver(function () use ($page) {
                return $page;
            });
        }

        $q['item_code'] = $request->item_code;
        $q['title'] = $request->title;
        $q['start_price'] = $request->start_price;
        $q['promotion_price'] = $request->promotion_price;
        $q['expire_date'] = $request->expire_date;
        $q['instock'] = $request->instock;
        $q['status'] = $request->status;

        $_result = self::orderBy('id','DESC')->where('promotion_price','!=','null');

        foreach ($q as $k=>$v)
        {
            $_result->where(function($w) use ($k,$v) {
                $searchWords = preg_split('/\s+/', $v);// explode(' ', $v);
                foreach($searchWords as $word){
                    if(trim($word) != '') {
                        $w->orWhere($k , 'LIKE', '%' . $word . '%');
                    }
                }
            });
        }

        $result = $_result->paginate(PageLimit);

        foreach ($q as $k=>$v)
        {
            if(trim($v) != '')
            {
                $result->appends($k,$v);
            }
        }
        return array_merge(['result' => $result],$q,['page' => $page]);
    }

    static function getPaginateSearchPopular($request)
    {
        $page = session('page')?session('page'):$request->page;
        if(session('page')) {
            Paginator::currentPageResolver(function () use ($page) {
                return $page;
            });
        }

        $q['item_code'] = $request->item_code;
        $q['title'] = $request->title;
        $q['count_sale'] = $request->count_sale;
        $q['instock'] = $request->instock;
        $q['status'] = $request->status;

        $_result = self::orderBy('count_sale','DESC')->take(50);

        foreach ($q as $k=>$v)
        {
            $_result->where(function($w) use ($k,$v) {
                $searchWords = preg_split('/\s+/', $v);// explode(' ', $v);
                foreach($searchWords as $word){
                    if(trim($word) != '') {
                        $w->orWhere($k , 'LIKE', '%' . $word . '%');
                    }
                }
            });
        }

        $result = $_result->paginate(PageLimit);

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
