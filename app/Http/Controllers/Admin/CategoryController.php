<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        return view('admin.category');
    }

    public function generalList(){
        $categories = Category::all();
        // return $categories;

        return response()->json(['categories' => $categories], 200);
    }

    public function show($id)
    {
        $category = Category::find($id);
        if(!$category){
            return response()->json(['message'=>'Not found'],404);
        }
        return response()->json(['category'=>$category]);
    }

    public function create(Request $request)
    {
        $category = new Category();
        $category->name = $request->input('category_name');
        $category->description = $request->input('category_desc');
        $category->status = true;

        if ($files = $request->file('image')) {

            //store file into image folder
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $file->storeAs('uploads/images', 's3');

            $filename = time().$file->getClientOriginalName();
            $file->move( $_SERVER['DOCUMENT_ROOT'] .'/uploads/images', $filename);
            $category->image = $filename;
        }

        
        try {
            $category->save();

        } catch (\Throwable $exception) {
            return response()->json(['ex'=>$exception->errorInfo],500);
        }

        return response()->json(['result' => "ok"], 200);

    }


    public function update(Request $request)
    {
        $id = $request->input('id');
        $category = Category::find($id);
        if(!$category)
        {
            return response()->json(['result'=>'Invalid Category'],404);
        }

        if ($file = $request->file('image')) {
            //store file into image folder

            $filename = time().$file->getClientOriginalName();
            $file->storeAs('uploads/images', 's3');

            $file->move($_SERVER['DOCUMENT_ROOT'] .'/uploads/images', $filename);
            $category->image = $filename;

        }
        else
        {
            $category->image = $category->image;

        }

        $category->name = $request->input('edit_category_name');
        $category->description = $request->input('edit_category_desc');
        try {
            $category->save();
        } catch (\Throwable $exception) {
            return response()->json(['ex'=>$exception->errorInfo],500);
        }
        return response()->json(['result' => "ok"], 200);
    }



    public function changeStatus(Request $request)
    {
        $id = $request->input('id');
        $category = Category::find($id);
        if(!$category)
        {
            return response()->json(['result'=>'Invalid Category'],404);
        }
        $category->status = $request->input('status');
        try {
            $category->save();
        } catch (\Throwable $exception) {
            return response()->json(['ex'=>$exception->errorInfo],500);
        }
        return response()->json(['result' => "ok"], 200);
    }
}
