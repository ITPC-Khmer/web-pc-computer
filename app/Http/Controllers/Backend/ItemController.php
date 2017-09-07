<?php

namespace App\Http\Controllers\Backend;
use App\Helpers\Glb;
use App\Models\Backend\Item;
use App\Models\Backend\ItemCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ItemController extends Controller
{
    function getCategory(Request $request){
        $parent = isset($request->id) ? $request->id : 0;
        $data = ItemCategory::getCategory($parent);
        return $data;
    }

    function itemCategorySession(Request $request)
    {
        $id = $request->id;
        $category_title = $request->category_title;
        //dd($id .' / ');
        //$m = ItemCategory::find($id);
        session([
            'item_category_id' => $id,
            'item_category_title' => $category_title,
        ]);
        return redirect('backend/item-form');
    }
    function selectCategory(){
        return view('backend.item.select-category');
    }
    function index(Request $request){
        return view('backend.item.index',Item::getPaginateSearch($request));
    }

    function form(Request $request){

        $id = $request->id;
        if (session('item_category_id') != null || $id>0){
            $id = $request->id - 0;
            $page = $request->page;
            $row = null;
            if ($id != 0){
                $row = Item::find($id);
            }
            return view('backend.item.form',['result'=>$row,'page'=> $page]);
        }
        return redirect()->back();
    }

    function delete_img($img)
    {
        Glb::deleteFile($img);
        Glb::deleteFile($img,true);
    }

    function save(Request $request){
        if($request->ajax())
        {
            if($request->hasFile('files')) {
                $files = $request->file('files');
                $json = Glb::upload($files, true);
                return response()->json($json);
            }else{
                return response()->json([]);
            }
        }else {
            $this->validate($request, [
                'title' => 'required',
//                'description' => 'required',
//                'category_id' => 'required|array'
            ]);

            $page = $request->_page;
            $submit_type = $request->submit - 0;

            if (Item::saveForm($request)) {
                if ($submit_type == 0) return redirect('/backend/item')->with('page', $page);
                if ($submit_type == 1) return redirect('/backend/item-form');
            } else {
                return redirect()->back()->withErrors($request->all());
            }
        }
    }

    function delete(Request $request)
    {
        $id = $request->id-0;
        $post = Item::find($id);
        $image_url = $post->image_url;
        if($post->delete())
        {
            if($image_url) {
                foreach ($image_url as $img) {
                    Glb::deleteFile($img);
                    Glb::deleteFile($img, true);
                }
            }
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
        $itemStatus = Item::find($id);
        $itemStatus->amount =  $request->amount;
        $itemStatus->status =  $request->status;
        $itemStatus->save();
    }
    function update_instock(Request $request)
    {
        $id = $request->id-0;
        $itemInstock = Item::find($id);
        $itemInstock->instock =  $request->instock;
        $itemInstock->save();
    }
}
