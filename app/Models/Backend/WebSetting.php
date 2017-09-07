<?php

namespace App\Models\Backend;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Mockery\Exception;
use Illuminate\Pagination\Paginator;

class WebSetting extends Model
{
    protected $table = 'web_settings';
    static function saveData($request)
    {
        $id = $request->id;
        $key_value = $request->key_value;
        if($id>0)
        {
            $m = WebSetting::find($id);
            $m->key_value = $key_value;
            if($m->save())
            {
                return $m;
            }else {
                return null;
            }

        }else{
            return null;
        }

    }
    static function saveDataSelect($request)
    {
        $id = $request->id;
        $key_value = $request->key_value;
        if($id>0)
        {
            $m = WebSetting::find($id);
            $m->key_value = json_encode($key_value) ;
            if($m->save())
            {
                return $m;
            }else {
                return null;
            }

        }else{
            return null;
        }

    }
    static function saveFile($request)
    {
        $id = $request->id;
        $uploads =  'uploads/files' ;
        if($request->hasFile('my_file') && $id >0)
        {
            try {

                $m = WebSetting::find($id);

                if($m != null){

                    $file = $request->file('my_file');
                    $extension = $file->getClientOriginalExtension();
                    $filename = rand(11111, 99999) . '_' . time() . '.' . $extension;
                    $file->move(public_path($uploads), $filename);

                    $old_file = $m->key_value;
                    $m->key_value = $filename;

                    if($m->save())
                    {
                        if($old_file != '') {
                            if (File::exists("$uploads/$old_file")) File::delete("$uploads/$old_file");
                        }
                        return $m;
                    }else{
                        if(File::exists("$uploads/$filename")) File::delete("$uploads/$filename");
                        return null;
                    }
                }
            } catch (Exception $e) {
                return null;
            }

        }else{
            return null;
        }

    }
    static function getSetting($key)
    {
        $m = WebSetting::where('key',$key)->first();
        if($m != null)
        {
            if($m->key_type == 'text'){
                return $m->key_value;
            }elseif ($m->key_type == 'file'){
                return $m->key_value;
            }elseif ($m->key_type == 'select'){
                return $m->key_value == ''?[]:json_decode($m->key_value);
            }else{
                return null;
            }
            //return $m->key_value;
        }else{
            return null;
        }
    }

//    ================================
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

    public function getImageUrlAttribute($option)
    {
        return json_decode($option);
    }

    static function getPaginateSearch($request)
    {
        $page = session('page')?session('page'):$request->page;
        if(session('page')) {
            Paginator::currentPageResolver(function () use ($page) {
                return $page;
            });
        }

        $q['key'] = $request->title;
        $q['title'] = $request->description;
        $q['key_type'] = $request->key_type;

        $_result = WebSetting::orderBy('id','DESC');

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
            $model = WebSetting::find($id);
        }else{
            $model = new WebSetting();
        }
        $model->key = $request->key;
        $model->title = $request->title;
        $model->key_type = $request->key_type;
        return $model->save();
    }

}
