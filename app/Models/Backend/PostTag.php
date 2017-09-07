<?php

namespace App\Models\Backend;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;

class PostTag extends Model
{
    protected $table = 'post_tags';

    public function getCreatedAtAttribute($date)
    {
        return Carbon::parse($date)->format('d/m/Y H:i');
    }

    public function getOptionAttribute($option)
    {
        return json_decode($option);
    }

    public function setOptionAttribute($value)
    {
        $this->attributes['option'] = json_encode($value);
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
        $q['status'] = $request->status;

        $_result = PostTag::orderBy('id','DESC');

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
        if ($id != 0){
            $model = PostTag::find($id);
        }else{
            $model = new PostTag();
        }
        $model->title = $request->title;
        $model->description = $request->description;
        $model->status = $request->status;
        $model->option = $request->option;
        $model->user_id = get_user_id();

        return $model->save();
    }

}
