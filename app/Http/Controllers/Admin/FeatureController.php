<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    public function index(){
        return view('admin.features');
    }

    public function generalList(){

        $features = Feature::all();
        return response()->json(['features' => $features], 200);
    }

    public function show($id)
    {
        $feature = Feature::find($id);
        if(!$feature){
            return response()->json(['message'=>'Not found'],404);
        }
        return response()->json(['feature'=>$feature]);
    }

    public function create(Request $request)
    {
        $feature = new Feature();
        $feature->name = $request->input('feature_name');
        $feature->status = true;

        try {
            $feature->save();

        } catch (\Throwable $exception) {
            return response()->json(['ex'=>$exception->errorInfo],500);
        }

        return response()->json(['result' => "ok"], 200);

    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $feature = Feature::find($id);
        if(!$feature)
        {
            return response()->json(['result'=>'Invalid Feature'],404);
        }

        // if ($file = $request->file('image')){
        //     //store file into image folder

        //     $filename = time().$file->getClientOriginalName();
        //     $file->storeAs('uploads/images', 's3');

        //     $file->move(public_path('uploads/images'), $filename);
        //     $feature->image = $filename;

        // }
        // else
        // {
        //     $feature->image = $feature->image;

        // }

        $feature->name = $request->input('edit_feature_name');
        try {
            $feature->save();
        } catch (\Throwable $exception) {
            return response()->json(['ex'=>$exception->errorInfo],500);
        }
        return response()->json(['result' => "ok"], 200);
    }

    public function changeStatus(Request $request)
    {
        $id = $request->input('id');
        $feature = Feature::find($id);
        if(!$feature)
        {
            return response()->json(['result'=>'Invalid Feature'],404);
        }
        $feature->status = $request->input('status');
        try {
            $feature->save();
        } catch (\Throwable $exception) {
            return response()->json(['ex'=>$exception->errorInfo],500);
        }
        return response()->json(['result' => "ok"], 200);
    }
    
}
