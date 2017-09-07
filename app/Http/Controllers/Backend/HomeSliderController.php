<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Glb;
use App\Models\Backend\SlideHome;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeSliderController extends Controller
{
    function index(Request $request){
        return view('backend.slider.home.index',SlideHome::getPaginateSearch($request));
    }

    function form(Request $request){
        $id = $request->id - 0;
        $page = $request->page;

        $row = null;
        if ($id != 0){
            $row = SlideHome::find($id);
        }

        return view('backend.slider.home.form',['result'=>$row,'page'=> $page]);
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
                'about' => 'required',
                'description' => 'required',
            ]);

            $page = $request->_page;
            $submit_type = $request->submit - 0;

            if (SlideHome::saveForm($request)) {
                if ($submit_type == 0) return redirect('/backend/home-slider')->with('page', $page);
                if ($submit_type == 1) return redirect('/backend/home-slider-form');
            } else {
                return redirect()->back()->withErrors($request->all());
            }
        }
    }
    function delete(Request $request)
    {
        $id = $request->id-0;

        $post = SlideHome::find($id);
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
        $postTag = SlideHome::find($id);
        $postTag->status =  $request->status;
        $postTag->save();
    }
}
