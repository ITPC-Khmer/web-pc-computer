<?php

namespace App\Models\Backend;

use App\Helpers\Glb;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

class Item extends Model
{
    protected $dates = ['expire_date'];
    protected $table = 'items';
    public function category()
    {
        return $this->belongsTo('App\Models\Backend\ItemCategory', 'category_id');
    }
    public function getCreatedAtAttribute($date)
    {
        return Carbon::parse($date)->format('d/m/Y');
    }

    public function getOptionAttribute($option)
    {
        return json_decode($option);
    }

    public function getTitleAttribute($title)
    {
        $l = get_ses_lang();
        if($l == 'en') return $title;

        $option = ($this->option);
        if(isset($option->title->$l))
        {
            return $option->title->$l != ''?$option->title->$l:$title;
        }

        return $title;
    }

    public function getDescriptionAttribute($description)
    {
        $l = get_ses_lang();
        //$description = $this->description;
        if($l == 'en') return $description;

        $option = ($this->option);
        if(isset($option->description->$l))
        {
            return $option->description->$l != ''?$option->description->$l:$description;
        }

        return $description;
    }
    public function getContentAttribute($content)
    {
        $l = get_ses_lang();
        //$description = $this->description;
        if($l == 'en') return $content;

        $option = ($this->option);
        if(isset($option->content->$l))
        {
            return $option->content->$l != ''?$option->content->$l:$content;
        }

        return $content;
    }



    public function setOptionAttribute($value)
    {
        $this->attributes['option'] = json_encode($value);
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

        $q['item_code'] = $request->item_code;
        $q['title'] = $request->title;
        $q['instock'] = $request->instock;
        $q['amount'] = $request->amount;
        $q['status'] = $request->status;
        $q['category_title'] = $request->category_title;
        $_result = Item::orderBy('id','DESC');
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
            $model = Item::find($id);
        }else{
            $model = new Item();
        }
        if ($request->category_id > 0){
            $model->category_id = $request->category_id ;
        }else{
            $model->category_id = session('item_category_id') ;
        }
        $model->item_code = $request->item_code;
        $model->title = $request->title;
        $model->condition = $request->condition;
        $model->image_url = $request->image_url;
        $model->specifics = json_encode($request->specifics);
//        $model->specifics = $request->specifics != null?json_encode($request->specifics):json_encode([]);
        $model->start_price = $request->start_price;
        $model->promotion_price = $request->promotion_price;
        $model->expire_date = $request->expire_date;
        $model->amount = $request->amount;
        $model->status = $request->status;
        $model->instock = $request->instock;
        $model->content = $request->content;
        $model->user_id = get_user_id();
        $model->option = $request->option;

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
