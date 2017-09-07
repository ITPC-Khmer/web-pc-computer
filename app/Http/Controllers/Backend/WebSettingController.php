<?php

namespace App\Http\Controllers\Backend;

use App\Models\Backend\WebSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WebSettingController extends Controller
{
    function index()
    {
        $rows = WebSetting::all();
        return view('backend.web-setting.index',['rows'=>$rows]);
    }
    function saveText(Request $request)
    {
        if(WebSetting::saveData($request) != null)
        {
            return response()->json(['error'=>0]);
        }else{
            return response()->json(['error'=>1]);
        }
    }
    function saveTextSelect(Request $request)
    {
        if(WebSetting::saveDataSelect($request) != null)
        {
            return response()->json(['error'=>0]);
        }else{
            return response()->json(['error'=>1]);
        }
    }
    function saveFile(Request $request)
    {

        $m = WebSetting::saveFile($request);
        if($m != null)
        {
            return '<script>parent.showMyImage("'.$m->id.'","'.asset("uploads/files/$m->key_value").'");</script>';
        }else{
            return '<script>alert("save error!!");</script>';
        }

    }
//    ===========================================
    function viewIndex(Request $request){
        return view('backend.web-setting.view_add',WebSetting::getPaginateSearch($request));
    }

    function form(Request $request){
        $id = $request->id - 0;
        $page = $request->page;

        $row = null;
        if ($id != 0){
            $row = WebSetting::find($id);
        }

        return view('backend.web-setting.form_add',['result'=>$row,'page'=> $page]);
    }

    function save(Request $request){

        $this->validate($request,[
            'key' => 'required',
            'title' => 'required'
        ]);

        $page = $request->_page;
        $submit_type = $request->submit-0;

        if (WebSetting::saveForm($request)){
            if ($submit_type == 0)return redirect('/backend/web-setting-index')->with('page',$page);
            if ($submit_type == 1)return redirect('/backend/web-setting-form');
        }else{
            return redirect()->back()->withErrors($request->all());
        }

    }

    function delete(Request $request)
    {
        $id = $request->id-0;

        if(WebSetting::find($id)->delete())
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

}
