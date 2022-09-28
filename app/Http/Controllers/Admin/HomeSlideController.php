<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\HomeSlide;

class HomeSlideController extends Controller
{
    public function index(){
        return view('admin.slides');
    }

    public function show($id){
        $slide = HomeSlide::find($id);
        if(!$slide){
            return response()->json(['message'=>'Not found'],404);
        }
        return response()->json(['slide'=>$slide], 200);
    }

    public function generalList(){
        $slides = HomeSlide::all();
        return response()->json(['slides'=>$slides], 200);
    }

    public function create(Request $request){

        $slide = new HomeSlide();

        $slide->title = $request->input('title');
        $slide->description = "desc";
           
        if ($files = $request->file('image')) {
            //store file into image folder

        $file = $request->file('image');
        $name = $file->getClientOriginalName();
        $file->storeAs('uploads/images', 's3');

        $filename = time().$file->getClientOriginalName();
        $file->move( $_SERVER['DOCUMENT_ROOT'] .'/uploads/images', $filename);
        $slide->image = $filename;
        }

    try {
        $slide->save();

    } catch (\Throwable $exception) {
        return response()->json(['ex'=>$exception->errorInfo],500);
    }

    return response()->json(['result' => "ok"], 200);

}

public function update(Request $request){
    $slide = HomeSlide::find($request->input('id'));
    if(!$slide){
        return response()->json(['message'=>'Not found'],404);
    }

    $slide->title = $request->input('title');
    $slide->description = $request->input('description');

    if ($files = $request->file('image')) {
        //store file into image folder

    $file = $request->file('image');
    $name = $file->getClientOriginalName();
    $file->storeAs('uploads/images', 's3');

    $filename = time().$file->getClientOriginalName();
    $file->move( $_SERVER['DOCUMENT_ROOT'] .'/uploads/images', $filename);
    $slide->image = $filename;
    }

    try {
        $slide->save();
    } catch (\Throwable $th) {
        //throw $th;
        return response()->json(['ex'=>$th],500);
    }

    return response()->json(['result'=> "ok"], 200);
}

public function destroy($id){
    $slide = HomeSlide::find($id);
    if(!$slide){
        return response()->json(['message'=>'Not found'],404);
    }
    else{
        $slide->delete();
    }

    return response()->json(['result'=> "ok"], 200);

}

}

