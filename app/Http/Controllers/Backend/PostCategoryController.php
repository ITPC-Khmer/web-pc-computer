<?php

namespace App\Http\Controllers\Backend;

use App\Models\Backend\PostCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostCategoryController extends Controller
{
    function index(Request $request){
        return view('backend.post-category.index',PostCategory::getPaginateSearch($request));
    }

    function form(Request $request){
        $id = $request->id - 0;
        $page = $request->page;

        $row = null;
        if ($id != 0){
            $row = PostCategory::find($id);
        }

        return view('backend.post-category.form',['result'=>$row,'page'=> $page]);
    }

    function save(Request $request){

        $this->validate($request,[
            'title' => 'required',
            'description' => 'required'
        ]);

        $page = $request->_page;
        $submit_type = $request->submit-0;

        if (PostCategory::saveForm($request)){
            if ($submit_type == 0)return redirect('/backend/post-category')->with('page',$page);
            if ($submit_type == 1)return redirect('/backend/post-category-form');
        }else{
            return redirect()->back()->withErrors($request->all());
        }

    }

    function delete(Request $request)
    {
        $id = $request->id-0;

        if(PostCategory::find($id)->delete())
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
        $postCategory = PostCategory::find($id);
        $postCategory->status =  $request->status;
        $postCategory->save();
    }

}
