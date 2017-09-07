<?php

namespace App\Http\Controllers\Backend;

use App\Models\Backend\ItemCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ItemCategoryController extends Controller
{
    function index(Request $request){
        return view('backend.item-category.index',ItemCategory::getPaginateSearch($request));
    }

    function form(Request $request){
        $id = $request->id - 0;
        $page = $request->page;

        $row = null;
        if ($id != 0){
            $row = ItemCategory::find($id);
        }

        return view('backend.item-category.form',['result'=>$row,'page'=> $page]);
    }

    function save(Request $request){

        $this->validate($request,[
            'title' => 'required',
            'description' => 'required'
        ]);

        $page = $request->_page;
        $submit_type = $request->submit-0;

        if (ItemCategory::saveForm($request)){
            if ($submit_type == 0)return redirect('/backend/item-category')->with('page',$page);
            if ($submit_type == 1)return redirect('/backend/item-category-form');
        }else{
            return redirect()->back()->withErrors($request->all());
        }

    }

    function delete(Request $request)
    {
        $id = $request->id-0;

        if(ItemCategory::find($id)->delete())
        {
            if ($request->ajax()){
                return response()->json(['affected' => 1]);
            }
        }else{
            if ($request->ajax()){
                return response()->json(['affected' => 0]);
            }
        }
        return redirect()->back();

    }

    function update_status(Request $request)
    {
        $id = $request->id-0;
        $postTag = ItemCategory::find($id);
        $postTag->status =  $request->status;
        $postTag->save();
    }

}
