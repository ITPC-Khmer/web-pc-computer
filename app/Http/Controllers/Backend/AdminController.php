<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Models\Backend\Admin;
use Illuminate\Http\Request;
use App\Helpers\Glb;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    function noPermission(){
        return view('backend.admin.no-permission');
    }
    function dashboard(){
        return view('backend.dashboard.index');
    }
    function adminLogin(){
        return view('backend.admin.login');
    }
//    function postLogin(Request $request){
//        $u= Admin::where('email',$request->email)->first();
//        if($u)
//        {
//            if(\Hash::check($request->password, $u->password))
//            {
//                $request->session()->put('mysess',collect($u));
//                if ($u->role_id-0 ==1)
//                {
//                    return redirect('/backend/dashboard');
//                }
//                return redirect('/backend/dashboard');
//            }
//        }
//
//        return redirect()->back();
//    }
    function postLogin(Request $request){
        $u= Admin::where('name',$request->name)->first();
        if($u)
        {
            if(\Hash::check($request->password, $u->password))
            {
                $request->session()->put('mysess',collect($u));
                if ($u->role_id-0 ==1)
                {
                    return redirect('/backend/dashboard');
                }
                return redirect('/backend/dashboard');
            }
        }

        return redirect()->back();
    }

    function getLogout(){
        return view('backend.admin.loin');
    }

    function index(Request $request){
        return view('backend.admin.index',Admin::getPaginateSearch($request));
    }

    function form(Request $request){
        $id = $request->id - 0;
        $page = $request->page;

        $row = null;
        if ($id != 0){
            $row = Admin::find($id);
        }

        return view('backend.admin.form',['result'=>$row,'page'=> $page]);
    }
    function save(Request $request)
    {

        $id = $request->input('id', 0) - 0;

        $v = [
            'role_id' => 'required',
            'phone' => 'required',
            'name' => 'required|max:255|unique:admins',
            'email' => 'required|email|max:255|unique:admins',
            'password' => 'min:6|required',
            'password_confirmation' => 'min:6|same:password'
        ];
        if($id > 0) {
             if ($request->password . '' == '') {
                 unset($v['password']);
                 unset($v['password_confirmation']);

             }
         }

        $this->validate($request, $v);

        $page = $request->_page;
        $submit_type = $request->submit - 0;

        if (Admin::saveForm($request)) {
            if ($submit_type == 0) return redirect('/backend/admin')->with('page', $page);
            if ($submit_type == 1) return redirect('/backend/admin-form');
        } else {
            return redirect()->back()->withErrors($request->all());
        }
    }
    function delete(Request $request)
    {
        $id = $request->id-0;

        if(Admin::find($id)->delete())
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
