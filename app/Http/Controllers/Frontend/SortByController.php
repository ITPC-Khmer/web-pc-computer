<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SortByController extends Controller
{
    function shortBy(Request $request){
//        $name = Item::orderBy('surname', 'desc')->get();
        $data = $request->sort_by;
        $refind_search = isset($request->refind_search)?$request->refind_search:0;
        $name = DB::table('items');
        if ($data = 'desc'){
            $name->orderBy('surname', $data);
        }else if ($data = 'asc'){
            $name->orderBy('surname', $data);
        }else if ($data = 'price desc'){
            $name->orderBy('start_price', $data);
        }else if ($data = 'price asc'){
            $name->orderBy('start_price', $data);
        }else if ($data = 'count_sale desc'){
            $name->orderBy('count_sale', $data);
        }else if ($data = 'count_sale asc'){
            $name->orderBy('count_sale', $data);
        }
        if ($refind_search != 0){
            $name->where('specifics', 'like','%'.$data.'%');
        }

        return response()->json($name->get());
    }
}
