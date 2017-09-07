<?php

namespace App\Models\Backend;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;

class ItemCategory extends Model
{
    protected $table = 'item_categories';

    static function getParent($id,$select=0,$parent=0)
    {
        $opc = '';
        $result = ItemCategory::where('id','<>',$id)->where('parent',$parent)->get();
        if(count($result)>0)
        {
            foreach ($result as $item)
            {
                $result2 = ItemCategory::where('id','<>',$id)->where('parent',$item->id)->get();
                $opc .= '<option '.($select - 0 ==$item->id - 0?' selected="selected" ':'').' value="'.$item->id.'">'. nbs(($item->level - 0)*5).$item->title.'</option>';

                if(count($result2)>0){
                    $opc .= ItemCategory::getParent($id,$select,$item->id);
                }
            }
        }
        return $opc;
    }

    static function getOption($select = 0,$parent = 0,$level = 0)
    {
        $op = '';
        $rows = self::where('parent',$parent)->get();
        if(count($rows)>0)
        {
            foreach ($rows as $row)
            {
                $rows_sub = self::where('parent',$row->id)->get();

                $selected = $select == $row->id ? 'selected="selected"':'';


                if(count($rows_sub)>0)
                {
                    $op .= '<option disabled="disabled" '.$selected.' value="'.$row->id.'" data-last="0">'.str_repeat('&nbsp;',$level*4).$row->title.'</option>';

                    $op .= self::getOption($select,$row->id,$level+1);
                }else{
                    $op .= '<option '.$selected.' value="'.$row->id.'" data-last="1">'.str_repeat('&nbsp;',$level*4).$row->title.'</option>';
                }
            }
        }
        return $op;
    }

    static function getOptionMulti($select = [],$parent = 0,$level = 0)
    {
        $op = '';
        $rows = self::where('parent',$parent)->get();
        if(count($rows)>0)
        {
            foreach ($rows as $row)
            {
                $rows_sub = self::where('parent',$row->id)->get();

                $selected =  in_array($row->id,$select) ? 'selected="selected"':'';
                if(count($rows_sub)>0)
                {
                    $op .= '<option disabled="disabled" '.$selected.' value="'.$row->id.'" data-last="0">'.str_repeat('&nbsp;',$level*4).$row->title.'</option>';


                    $op .= self::getOptionMulti($select,$row->id,$level+1);
                }else{
                    $op .= '<option '.$selected.' value="'.$row->id.'" data-last="1">'.str_repeat('&nbsp;',$level*4).$row->title.'</option>';
                }
            }
        }

        return $op;
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
            $model = ItemCategory::find($id);
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

        $_result = ItemCategory::orderBy('id','DESC');

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
            $model = ItemCategory::find($id);
        }else{
            $model = new ItemCategory();
        }
        $model->title = $request->title;
        $model->parent = $request->parent != null?$request->parent:0;
        $model->description = $request->description;
        $model->status = $request->status;
        $model->show_in_home = $request->show_in_home;
        $model->option = $request->option;
        $model->user_id = get_user_id();
        if($model->save()){
            $genParentLevel = ItemCategory::genParentLevel($model->id);
            $model->level = $genParentLevel['level'];
            $model->hierarchical = $genParentLevel['hierarchical'];
            $model->hierarchical_title = $genParentLevel['hierarchical_title'];
            $model->save();
            return true;
        }else{ return false;}
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


    static function getCategory($parent_ = 0){
        $data = self::where('parent',$parent_)->get();
        $html = '';
        $html .= '<div class="col-md-4">';
        if (count($data) > 0){
            $html .= '<select id="select_'.$parent_.'" class="form-control portlet light bordered cat-id"  size="8" style="height: 300px;">';
            foreach ($data as $row){
                $html .= "<option value='$row->id'>$row->title</option>";
            }
            $html .= ' </select>';
        }else{
//            $html .= '<a href="'.url('item-session?id='.$parent_).'">Add Item</a>';
            $html .= '<button type="submit" name="submit" class="btn blue">Create</button>';
        }
        $html .= '</div>';
        $answer['html'] = $html;
        return $html;
    }

    static function getTitle($id)
    {
        $m = self::find($id);
        if($m != null)
        {
            return $m->title;
        }else{ return '';}

    }

    static function getId($id)
    {
        $m = self::find($id);
        if($m != null)
        {
            return $m->id;
        }else{ return '';}

    }

    static function getMenu($parent=0){
        $html = '';
        $result = ItemCategory::where('parent',$parent)->get();
        if(count($result)>0)
        {
            foreach ($result as $item)
            {
                $result2 = ItemCategory::where('parent',$item->id)->get();



                if(count($result2)>0){

                    $html .='<li class="">
                        <a href="'.url("category-list/{$item->id}").'">
                        <i class="fa fa-plus-square"></i>'.$item->title.'</a>
                            <div class="wrap-popup">
                                <div class="popup">
                                    <div class="row">';

                                    foreach ($result2 as $row2) {

                                        $result3 = ItemCategory::where('parent',$row2->id)->get();


                                        $html .= '<div class="col-md-4 col-sm-6">
                                                                    <h3> <a href="' . url("category-list/{$row2->id}") . '">'.$row2->title.'</a></h3>
                                                                    <ul class="nav">';
                                                foreach ($result3 as $row3) {
                                                    $html .= ' <li><a href="' . url("category-list/{$row3->id}") . '">'.$row3->title.'</a></li>';
                                                }
                                                $html .= '</ul>
                                            <br>
                                        </div>';
                                    }
                            $html .='</div>
                                </div>
                            </div>
                        </li>
                    ';
                    }else{
                        $html .='<li class="nosub">
                            <a href="'.url("category-list/{$item->id}").'"><i class="fa fa-plus-square"></i>'.$item->title.'</a></li>
                    ';
                }
            }
        }
        return $html;
    }

    static function getMenuMobile($parent=0){
        $html = '';
        $result = ItemCategory::where('parent',$parent)->get();
        if(count($result)>0)
        {
            foreach ($result as $item)
            {
                $result2 = ItemCategory::where('parent',$item->id)->get();
                if(count($result2)>0){
                    $html .='<li><a href="'.url("category-list/{$item->id}").'">'.$item->title.'</a>
                                 <ul>                                    
                                    ';
                    foreach ($result2 as $row2) {
                        $result3 = ItemCategory::where('parent',$row2->id)->get();
                        $html .= '<li><a href="' . url("category-list/{$row2->id}") . '">'.$row2->title.'</a>
                                      <ul>
                                                   
                                                ';
                        foreach ($result3 as $row3) {
                            $html .= '  <li><a href="' . url("category-list/{$row3->id}") . '">'.$row3->title.'</a></li>';
                        }
                            $html .= '  </ul>
                                   </li>';
                    }
                    $html .='    </ul>
                            </li>';
                }else{
                    $html .=' <li><div class="home"><a href="'.url("category-list/{$item->id}").'">'.$item->title.'</a></div></li>
                ';
                }
            }
        }
        return $html;
    }
}
