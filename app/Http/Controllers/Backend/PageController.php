<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Glb;
use App\Models\Backend\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    function index(Request $request){
        return view('backend.page.index',Page::getPaginateSearch($request));
    }

    function form(Request $request){
        $id = $request->id - 0;
        $page = $request->page;

        $row = null;
        if ($id != 0){
            $row = Page::find($id);
        }

        return view('backend.page.form',['result'=>$row,'page'=> $page]);
    }

    function delete_img($img)
    {
        Glb::deleteFile($img);
        Glb::deleteFile($img,true);
    }

    function save(Request $request){

        if($request->ajax())
        {
            $files = $request->file('files');
            if($request->hasFile('files')) {
                $json = Glb::upload($files, true);
                return response()->json($json);
            }else{
                return response()->json([]);
            }
        }else {

            $this->validate($request, [
                'title' => 'required',
                'description' => 'required'
            ]);

            $page = $request->_page;
            $submit_type = $request->submit - 0;

            if (Page::saveForm($request)) {
                if ($submit_type == 0) return redirect('/backend/page')->with('page', $page);
                if ($submit_type == 1) return redirect('/backend/page-form');
            } else {
                return redirect()->back()->withErrors($request->all());
            }
        }

    }

    function delete(Request $request)
    {
        $id = $request->id-0;

        $page = Page::find($id);
        $image_url = $page->image_url;

        if($page->delete())
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
        $page = Page::find($id);
        $page->status =  $request->status;
        $page->save();
    }
 function update_page_type(Request $request)
    {
        $id = $request->id-0;
        $page = Page::find($id);
        $page->page_type =  $request->page_type;
        $page->save();
    }

}
