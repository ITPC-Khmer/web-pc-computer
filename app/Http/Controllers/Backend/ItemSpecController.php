<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Glb;
use App\Models\Backend\Item;
use App\Models\Backend\ItemSpec;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ItemSpecController extends Controller
{
    function index(Request $request){
        return view('backend.item-spec.index',ItemSpec::getPaginateSearch($request));
    }

    function form(Request $request){
        $id = $request->id - 0;
        $page = $request->page;

        $row = null;
        if ($id != 0){
            $row = ItemSpec::find($id);
        }

        return view('backend.item-spec.form',['result'=>$row,'page'=> $page]);
    }

    function save(Request $request)
    {

        $this->validate($request, [
            'spec_type' => 'required',
            'category_id' => 'required'
        ]);

        $page = $request->_page;
        $submit_type = $request->submit - 0;

        if (ItemSpec::saveForm($request)) {
            if ($submit_type == 0) return redirect('/backend/item-spec')->with('page', $page);
            if ($submit_type == 1) return redirect('/backend/item-spec-form');
        } else {
            return redirect()->back()->withErrors($request->all());
        }
    }

    function delete(Request $request)
    {
        $id = $request->id-0;

        if(ItemSpec::find($id)->delete())
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

    function getCheckOption(Request $request){

        if($request->ajax()){


            $id = $request->id;

            $data = Item::find($id);

            if(count($data)>0){


                if (count(json_decode($data->specifics)) == 1){
                    foreach (json_decode($data->specifics) as $row){
                        if ($row->key == null and $row->value-0 == 0){
                            return response()->json('false');
                        }else{
                            return response()->json('true');
                        }
                    }
                }else{
                    return response()->json('true');
                }

            }

        }

        return response()->json('false');

    }
    function update_spec_type(Request $request)
    {
        $id = $request->id-0;
        $postTag = ItemSpec::find($id);
        $postTag->spec_type =  $request->spec_type;
        $postTag->save();
    }

    function checkDuplicateKey(Request $request){
        if ($request->ajax())
           return ItemSpec::checkDuplicateKey1($request);

    }

}
