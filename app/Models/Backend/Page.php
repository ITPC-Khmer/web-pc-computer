<?php

namespace App\Models\Backend;

use App\Helpers\Glb;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;

class Page extends Model
{
    protected $table = 'pages';

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

    public function getVideoUrlAttribute($option)
    {
        return json_decode($option);
    }

    public function setVideoUrlAttribute($value)
    {
        $this->attributes['video_url'] = json_encode($value);
    }

    public function getImageUrlAttribute($option)
    {
        return json_decode($option);
    }

    public function setImageUrlAttribute($value)
    {
        $this->attributes['image_url'] = json_encode($value);
    }

    static function getPaginateSearch($request)
    {
        $page = session('page')?session('page'):$request->page;
        if(session('page')) {
            Paginator::currentPageResolver(function () use ($page) {
                return $page;
            });
        }
        $q['page_type'] = $request->page_type;
        $q['title'] = $request->title;
        $q['description'] = $request->description;
        $q['status'] = $request->status;

        $_result = Page::orderBy('id','DESC');

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
            $model = Page::find($id);
        }else{
            $model = new Page();
        }

        $model->title = $request->title;
        $model->description = $request->description;
        $model->content = $request->content;
        $model->image_url = $request->image_url;
        $model->status = $request->status;
        $model->page_type = $request->page_type;
        $model->option = $request->option;
        $model->user_id = get_user_id();

        if($model->save()){

            if($request->image_url) {
                foreach ($request->image_url as $img) {
                    Glb::moveTmpFile($img);
                }
            }

            $d_image_url = $request->d_image_url;
            if($d_image_url)
            {
                foreach ($d_image_url as $img)
                {
                    Glb::deleteFile($img);
                    Glb::deleteFile($img,true);
                }
            }

            return true;
        }else{
            foreach ($request->image_url as $img)
            {
                Glb::deleteFile($img);
                Glb::deleteFile($img,true);
            }

            return false;
        }
    }

}
