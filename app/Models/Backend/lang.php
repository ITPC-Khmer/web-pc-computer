<?php

namespace App\Models\Backend;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;

class Lang extends Model
{
    protected $table = 'langs';
    public $timestamps = false;

    static function putLang($key,$_lang = 'kh')
    {
        $l = Lang::where('key',$key)->first();
        if($l)
        {
            if(array_key_exists($_lang,arr_lang()))
            {
                if($l->$_lang != '') return $l->$_lang;
                else return $key;
            }else{
                return $key;
            }
        }else{
            $lang = new Lang();
            $lang->key = $key;
            $lang->save();
            return $key;
        }
    }

    static function getPaginateSearch($request)
    {
        $page = session('page')?session('page'):$request->page;
        if(session('page')) {
            Paginator::currentPageResolver(function () use ($page) {
                return $page;
            });
        }

        $q['key'] = $request->key;
        $q['en'] = $request->en;
        $q['kh'] = $request->kh;

        $_result = Lang::orderBy('langs.key','ASC');

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
