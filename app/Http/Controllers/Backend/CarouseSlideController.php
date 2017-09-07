<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Glb;
use App\Models\Backend\CarouseSlide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CarouseSlideController extends Controller
{
    function index(Request $request){
        return view('backend.slider.carousel_slide.index',CarouseSlide::getPaginateSearch($request));
    }

    function form(Request $request){
        $id = $request->id - 0;
        $page = $request->page;

        $row = null;
        if ($id != 0){
            $row = CarouseSlide::find($id);
        }

        return view('backend.slider.carousel_slide.form',['result'=>$row,'page'=> $page]);
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
                'description' => 'required',
            ]);

            $page = $request->_page;
            $submit_type = $request->submit - 0;

            if (CarouseSlide::saveForm($request)) {
                if ($submit_type == 0) return redirect('/backend/carousel-slide')->with('page', $page);
                if ($submit_type == 1) return redirect('/backend/carousel-slide-form');
            } else {
                return redirect()->back()->withErrors($request->all());
            }
        }
    }
    function delete(Request $request)
    {
        $id = $request->id-0;

        $post = CarouseSlide::find($id);
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
        $carouseSlide = CarouseSlide::find($id);
        $carouseSlide->status =  $request->status;
        $carouseSlide->save();
    }
}
