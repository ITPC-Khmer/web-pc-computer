<?php

namespace App\Http\Controllers\Backend;

use App\Models\Backend\Lang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LangController extends Controller
{
    function index(Request $request){
        return view('backend.lang.index',Lang::getPaginateSearch($request));
    }
    static function save(Request $request)
    {
        $id = $request->id;
        $lan = $request->lan;
        $lang_val = $request->lang_val;

        $language = Lang::find($id);

        $language->$lan = $lang_val;

        $language->save();

        return '';
    }
}
