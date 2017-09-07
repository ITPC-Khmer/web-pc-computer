<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;

class Role extends Model
{
    protected $table = 'roles';
    static function getOption()
    {
        $roles = Role::all();

        $arr = [];
        foreach ($roles as $row)
        {
            $arr[$row->id] = $row->title;
        }
        return $arr;
    }
    static function getPaginateSearch($request)
    {
        $page = session('page')?session('page'):$request->page;
        if(session('page')) {
            Paginator::currentPageResolver(function () use ($page) {
                return $page;
            });
        }

        $q['title'] = $request->title;
        $q['description'] = $request->description;

        $_result = Role::orderBy('id','DESC');

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

    static function saveForm($request)
    {
        $id = $request->id;

        if ($id > 0) {
            $model = Role::find($id);
        } else {
            $model = new Role();
        }
        $model->title = $request->title;
        $model->description = $request->description;

        if ($model->save()) {
            return $model;
        } else {
            return null;
        }
    }
}
