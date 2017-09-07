<?php

namespace App\Models\Backend;

use App\Helpers\Glb;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;

class Post extends Model
{
    protected $table = 'posts';

    static function getOpTag($select = [])
    {
        $result = PostTag::orderBy('title','asc')->get();
        $op = '';
        foreach ($result as $row)
        {
            $op .= '<option '.(in_array($row->id,$select)?' selected="selected" ':'').' 
            value="'.$row->id.'">'.$row->title.'</option>';
        }
        return $op;
    }

    static function getOpCategory($select=[],$parent=0)
    {
        $opc = '';
        $result = PostCategory::where('parent',$parent)->get();
        if(count($result)>0)
        {
            foreach ($result as $item)
            {
                $result2 = PostCategory::where('parent',$item->id)->get();

                if(count($result2)>0){
                    $opc .= '<option  disabled="disabled"  value="'.$item->id.'">'. nbs(($item->level - 0)*5).$item->title.'</option>';

                    $opc .= Post::getOpCategory($select,$item->id);
                }else{
                    $opc .= '<option '.(in_array($item->id,$select)?' selected="selected" ':'').' value="'.$item->id.'">'. nbs(($item->level - 0)*5).$item->title.'</option>';
                }
            }
        }
        return $opc;
    }

    static function getArrPostTagDetailId($post_id)
    {
        $result = PostTagDetail::where('post_id',$post_id)->get();
        $tag = [];

        foreach ($result as $row)
        {
            $tag[] = $row->tag_id;
        }
        return $tag;
    }

    static function getArrPostCategoryDetailId($post_id)
    {
        $result = PostCategoryDetail::where('post_id',$post_id)->get();
        $cat = [];

        foreach ($result as $row)
        {
            $cat[] = $row->category_id;
        }
        return $cat;
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

        $q['title'] = $request->title;
        $q['description'] = $request->description;
        $q['status'] = $request->status;

        $_result = Post::orderBy('id','DESC');

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
            $model = Post::find($id);
        }else{
            $model = new Post();
        }

        $model->title = $request->title;
        $model->description = $request->description;
        $model->content = $request->content;

        $model->image_url = $request->image_url;
        $model->video_url = $request->video_url;

        $model->status = $request->status;
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

            //=============== PostCategoryDetail ====================
            PostCategoryDetail::where('post_id',$model->id)->delete();

            if(count($request->category_id)>0) {
                foreach ($request->category_id as $c_id) {
                    $postCategoryDetail = new PostCategoryDetail();
                    $postCategoryDetail->post_id = $model->id;
                    $postCategoryDetail->category_id = $c_id;
                    $postCategoryDetail->save();
                }
            }
            //=============== PostTagDetail ====================
            PostTagDetail::where('post_id',$model->id)->delete();

            if(count($request->tag_id)>0) {
                foreach ($request->tag_id as $c_id) {
                    $postTagDetail = new PostTagDetail();
                    $postTagDetail->post_id = $model->id;
                    $postTagDetail->tag_id = $c_id;
                    $postTagDetail->save();
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
