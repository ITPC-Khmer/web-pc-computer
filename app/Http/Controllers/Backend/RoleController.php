<?php

namespace App\Http\Controllers\Backend;

use App\Models\Backend\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    function index(Request $request){
        return view('backend.role.index',Role::getPaginateSearch($request));
    }

    function form(Request $request){
        $id = $request->id - 0;
        $page = $request->page;
        $row = null;
        if ($id != 0){
            $row = Role::find($id);
        }

        return view('backend.role.form',['result'=>$row,'page'=> $page]);
    }

    function save(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);

        $page = $request->_page;
        $submit_type = $request->submit - 0;

        if (Role::saveForm($request)) {
            if ($submit_type == 0) return redirect('/backend/role')->with('page', $page);
            if ($submit_type == 1) return redirect('/backend/role-form');
        } else {
            return redirect()->back()->withErrors($request->all());
        }
    }

    function delete(Request $request)
    {
        $id = $request->id-0;

        if(Role::find($id)->delete())
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
