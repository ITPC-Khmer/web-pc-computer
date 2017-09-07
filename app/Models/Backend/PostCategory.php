<?php

namespace App\Models\Backend;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;

class PostCategory extends Model
{
    protected $table = 'post_categories';

    static function getParent($id,$select=0,$parent=0)
    {
        $opc = '';
        $result = PostCategory::where('id','<>',$id)->where('parent',$parent)->get();
        if(count($result)>0)
        {
            foreach ($result as $item)
            {
                $result2 = PostCategory::where('id','<>',$id)->where('parent',$item->id)->get();
                $opc .= '<option '.($select - 0 ==$item->id - 0?' selected="selected" ':'').' value="'.$item->id.'">'. nbs(($item->level - 0)*5).$item->title.'</option>';

                if(count($result2)>0){
                    $opc .= PostCategory::getParent($id,$select,$item->id);
                }
            }
        }
        return $opc;
    }

    static function genParentLevel($id)
    {
        $level = 0;
        $hierarchical = $id;
        $hierarchical_title = '';
        $loop = 0;
        while (true)
        {
            $loop++;
            $model = PostCategory::find($id);
            if($model == null){ break;}else{
                $hierarchical_title = $model->title. ($loop>1?'-'.$hierarchical_title:'');
                if($model->parent - 0 == 0)break;
                $id = $model->parent;
                $level++;
                $hierarchical = $id.'.'.$hierarchical;
            }
        }
        return ['level' => $level,'hierarchical'=>$hierarchical,'hierarchical_title'=>$hierarchical_title];
    }

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

        $_result = PostCategory::orderBy('id','DESC');

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
            $model = PostCategory::find($id);
        }else{
            $model = new PostCategory();
        }
        $model->title = $request->title;
        $model->parent = $request->parent != null?$request->parent:0;
        $model->description = $request->description;
        $model->status = $request->status;
        $model->show_in_home = $request->show_in_home;
        $model->option = $request->option;
        $model->user_id = get_user_id();
        if($model->save()){
            $genParentLevel = PostCategory::genParentLevel($model->id);
            $model->level = $genParentLevel['level'];
            $model->hierarchical = $genParentLevel['hierarchical'];
            $model->hierarchical_title = $genParentLevel['hierarchical_title'];
            $model->save();
            return true;
        }else{ return false;}
    }



}
