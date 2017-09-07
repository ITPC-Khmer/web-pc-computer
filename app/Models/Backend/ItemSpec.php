<?php

namespace App\Models\Backend;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

class ItemSpec extends Model
{
    protected $table = 'item_specs';

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

        $page = session('page') ? session('page') : $request->page;
        if (session('page')) {
            Paginator::currentPageResolver(function () use ($page) {
                return $page;
            });
        }

        $q['key'] = $request->key;
        $q['spec_type'] = $request->spec_type;
        $q['title'] = $request->title;


//        $_result = ItemSpec::orderBy('id', 'DESC');
        $_result = DB::table('item_specs')->join('item_categories','item_categories.id','item_specs.category_id')
            ->select('item_specs.*','item_categories.title');

        foreach ($q as $k => $v) {
            $_result->where(function ($w) use ($k, $v) {
                $searchWords = preg_split('/\s+/', $v);// explode(' ', $v);
                foreach ($searchWords as $word) {
                    if (trim($word) != '') {
                        $w->orWhere($k, 'LIKE', '%' . $word . '%');
                    }
                }
            });
        }

//        $result = $_result->paginate(PageLimit);
        $result = $_result->orderBy('item_specs.id', 'DESC')
            ->paginate(PageLimit);
        foreach ($q as $k => $v) {
            if (trim($v) != '') {
                $result->appends($k, $v);
            }
        }

        return array_merge(['result' => $result], $q, ['page' => $page]);
    }

    static function saveForm($request)
    {
        $id = $request->id;

        if ($id > 0) {
            $model = ItemSpec::find($id);
        } else {
            $model = new ItemSpec();
        }
        $model->category_id = $request->category_id;

        $model->key = $request->key;
//        $model->title = $request->title;
        $model->spec_type = $request->spec_type;

        if ($model->save()) {
            return $model;
        } else {
            return null;
        }
    }

    static function checkDuplicateKey1($request){

        $key = $request->key;
        $category_id = $request->category;

        $data = self::where('category_id',$category_id)->where('key',$key)->get();
        //dd(count($data));

        if (count($data) > 0){

            return 1;
        }else{

            return 0;
        }

    }
}
