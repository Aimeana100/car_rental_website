<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Car;
use App\Models\Admin\Category;
use App\Models\Admin\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\Constraint\Count;
use SebastianBergmann\Diff\Chunk;

class CarController extends Controller
{
    public function index(){

        $categories = Category::all();
        return view('admin.cars', [ 'categories' => $categories]);
    }

    public function generalList(){
        $cars = DB::table('cars')
        ->join('categories','categories.id','=','cars.category_id')
        ->select('*','cars.name as car_name', 'categories.name as cat_name', 'cars.id as car_id', 'cars.status as car_status', 'cars.image as car_image' )
        ->get();
        return response()->json(['cars' => $cars], 200);
    }
    
    public function getAllFeatures($id){

        $conts_of_features_exciting = count(DB::table('car_feature')->where('car_id','=',$id)->get());

        $car_features = DB::table('features')
        ->leftJoin('car_feature', 'features.id', '=', 'car_feature.id')
        ->where('car_feature.car_id', '=', count(DB::table('car_feature')->where('car_id','=',$id)->get()) > 0 ? $id : null )
        ->select('*', 'features.name as feature_name', 'features.id as f_id')
        ->get();
        return response()->json(['features' => $car_features], 200);
    }
    
    public function carFeatureCreate(Request $request){

      $featureidArray = Feature::all()->pluck('id');
      $carFeature = $request->input('feature');
      $car_id = $request->input('id');

      if (isset($carFeature)) {
          # code...
      
      for($i=0; $i < Count($carFeature); $i++){

              DB::table('car_feature')->insert(['car_id'=>$car_id, 'feature_id'=> $carFeature[$i] ]);
      }
    }

      return $carFeature;
    }

    public function show($id)
    {
        $car = Car::find($id);
        if(!$car){
            return response()->json(['message'=>'Not found'],404);
        }

        $categories = Category::all();
        return response()->json(['car'=>$car, 'categories'=>$categories]);
    }

    public function create(Request $request)
    {
        $car = new Car();
        $car->name = $request->input('name');
        $car->model = $request->input('model');
        $car->transmission = $request->input('transmission');
        $car->luggage = $request->input('luggage');
        $car->seats = $request->input('number_of_people');
        $car->per_hour = $request->input('price_hour');
        $car->per_day = $request->input('price_day');
        $car->per_month = $request->input('price_month');
        $car->description = $request->input('desc');
        $car->category_id = $request->input('category_id');
        $car->status = true;

        if ($files = $request->file('image')) {
            //store file into image folder
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $file->storeAs('uploads/images', 's3');
            $filename = time().$file->getClientOriginalName();
            $file->move(public_path('uploads/images'), $filename);
            $car->image = $filename;
        }

        try {
            $car->save();

        } catch (\Throwable $exception) {
            return response()->json(['ex'=>$exception->errorInfo],500);
        }

        return response()->json(['result' => "ok"], 200);
    }


    public function update(Request $request)
    {
        $id = $request->input('id');
        // return $id;

        $car = Car::find($id);

        if(!$car)
        {
            return response()->json(['result'=>'Invalid Car'],404);
        }

        if ($file = $request->file('image')) {
            //store file into image folder
            $filename = time().$file->getClientOriginalName();
            $file->storeAs('uploads/images', 's3');

            $file->move(public_path('uploads/images'), $filename);
            $car->image = $filename;
        }
        else
        {
            $car->image = $car->image;
        }

        $car->name = $request->input('edit_name');
        $car->model = $request->input('edit_model');
        $car->transmission = $request->input('edit_transmission');
        $car->luggage = $request->input('edit_luggage');
        $car->seats = $request->input('edit_seats');
        $car->per_hour = $request->input('edit_price_hour');
        $car->per_day = $request->input('edit_price_day');
        $car->per_month = $request->input('edit_price_month');
        $car->description = $request->input('edit_desc');
        $car->category_id = $request->input('category_id');
        
        // return $car;
        try {
            $car->save();
        } catch (\Throwable $exception) {
            return response()->json(['ex'=>$exception->errorInfo],500);
        }
        return response()->json(['result' => "ok", 'car'=>$car], 200);
    }

    public function changeStatus(Request $request)
    {
        $id = $request->input('id');
        $car = Car::find($id);
        if(!$car)
        {
            return response()->json(['result'=>'Invalid Car'],404);
        }
        $car->status = $request->input('status');
        try {
            $car->save();
        } catch (\Throwable $exception) {
            return response()->json(['ex'=>$exception->errorInfo],500);
        }
        return response()->json(['result' => "ok"], 200);
    }

}
