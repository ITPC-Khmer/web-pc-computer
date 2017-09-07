<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Glb;
use App\Models\Backend\Post;
use App\Models\Backend\PostCategoryDetail;
use App\Models\Backend\PostTagDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    function index(Request $request){
        return view('backend.post.index',Post::getPaginateSearch($request));
    }

    function form(Request $request){
        $id = $request->id - 0;
        $page = $request->page;

        $row = null;
        if ($id != 0){
            $row = Post::find($id);
        }

        return view('backend.post.form',['result'=>$row,'page'=> $page]);
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
                'category_id' => 'required|array'
            ]);

            $page = $request->_page;
            $submit_type = $request->submit - 0;

            if (Post::saveForm($request)) {
                if ($submit_type == 0) return redirect('/backend/post')->with('page', $page);
                if ($submit_type == 1) return redirect('/backend/post-form');
            } else {
                return redirect()->back()->withErrors($request->all());
            }
        }

    }

    function delete(Request $request)
    {
        $id = $request->id-0;

        $post = Post::find($id);
        $image_url = $post->image_url;

        if($post->delete())
        {
            PostCategoryDetail::where('post_id',$id)->delete();
            PostTagDetail::where('post_id',$id)->delete();

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
        $postTag = Post::find($id);
        $postTag->status =  $request->status;
        $postTag->save();
    }

}
