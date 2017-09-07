<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Glb;
use App\Models\Backend\PostTag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostTagController extends Controller
{
    function index(Request $request){

        return view('backend.post-tag.index',PostTag::getPaginateSearch($request));
    }

    function form(Request $request){
        $id = $request->id - 0;
        $page = $request->page;

        $row = null;
        if ($id != 0){
            $row = PostTag::find($id);
        }

        return view('backend.post-tag.form',['result'=>$row,'page'=> $page]);
    }

    function save(Request $request){

        $this->validate($request,[
            'title' => 'required',
            'description' => 'required'
        ]);

        $page = $request->_page;
        $submit_type = $request->submit-0;


        $image = $request->file('image_url');
        if($request->hasFile('image_url'))
        {
            Glb::resize($image);
        }

        if (PostTag::saveForm($request)){
            if ($submit_type == 0)return redirect('/backend/post-tag')->with('page',$page);
            if ($submit_type == 1)return redirect('/backend/post-tag-form');
        }else{
            return redirect()->back()->withErrors($request->all());
        }

    }

    function delete(Request $request)
    {
        $id = $request->id-0;

        if(PostTag::find($id)->delete())
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
        $postTag = PostTag::find($id);
        $postTag->status =  $request->status;
        $postTag->save();
    }

}
