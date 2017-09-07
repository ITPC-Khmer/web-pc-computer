<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Backend\Item;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SelectorController extends Controller
{
    function getAjax(Request $request){
        $data = [];
        if ($request->ajax()){
            $term = $request->term;

            $data = Item::select('id','title')->where('title','like','%'.$term.'%')->take(5)->get();

            return response()->json($data);

        }
    }
}
