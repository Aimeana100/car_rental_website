<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use App\Models\Admin\Car;
use Nette\Utils\DateTime;
use App\Models\Admin\Order;
use Illuminate\Http\Request;
use App\Models\Admin\Contact;
use Illuminate\Support\Carbon;
use App\Models\Admin\HomeSlide;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Psy\TabCompletion\Matcher\FunctionsMatcher;

class FrontController extends Controller
{


    public function index(Request $request){
        // if (! in_array($request->lang, ['en', 'es', 'fr'])) {
        //    return redirect()->route('front.home');
        // }

        // App::setLocale($request->lang);
        // $locale = App::currentLocale();
        // dd($locale);
        
        
        $cars = Car::with(['Category'])->where(['cars.status'=> true])->get();
        // dd($cars);
        return view('front.home', ['cars'=> $cars, 'slides'=>HomeSlide::all()]);
    }

    public function about(){
        $cars = Car::with(['Category'])->where(['cars.status'=> true])->get();
        return view('front.about', ['cars'=> $cars]);
    }

    public function contact(){
        return view('front.contact');
    }

    public function contactStore(Request $request){
        $contact = new Contact();
        $contact->contact_name = $request->input('contact_name');
        $contact->contact_email = $request->input('contact_email');
        $contact->contact_comment = $request->input('contact_comment');
        $contact->contact_date = now();
        
        try {
            $contact->save();
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['ex'=>$th->errorInfo], 500);
        }
        return response()->json(['result'=> "ok"]);
    }

    public function blogs(){
        return view('front.blogs');
    }


    public function services(){
        $cars = Car::with(['Category'])->where(['cars.status'=> true])->get();
        return view('front.services', ['cars'=> $cars]);
    }

    public function cars(Request $request){
        
         if (($request->get('sort') != null && $request->get('car_search')) != null) {

            $sort = $request->get('sort');
            $search = $request->get('car_search');

            $query = Car::with(['Category'])
            ->where(['cars.status'=> true])
            ->Where('cars.name', 'like', '%'.$search.'%')
            ->select('*','cars.name as car_name', 'cars.image as car_image');

            if($sort == "name"){
                $query = $query->orderBy('cars.name', 'asc');
            }
    
            if($sort == "price-high"){
                $query = $query->orderBy('cars.per_day', 'desc');
            }
    
            if($sort == "price-low"){
                $query = $query->orderBy('cars.per_day', 'asc');
            }

            $cars = $query->paginate(6);
            return view('front.cars', ['cars'=> $cars]);
        }

        elseif($request->get('sort') != null){

            $sort = $request->get('sort');

            $query = Car::with(['Category'])
            ->where(['cars.status'=> true])
            ->select('*','cars.name as car_name', 'cars.image as car_image');
            

            if($sort == "name"){
                $query = $query->orderBy('cars.name', 'asc');
            }
    
            if($sort == "price-high"){
                $query = $query->orderBy('cars.per_day', 'desc');
            }
    
            if($sort == "price-low"){
                $query = $query->orderBy('cars.per_day', 'asc');
            }

            $cars = $query->paginate(6);
            return view('front.cars', ['cars'=> $cars]);
        }

        elseif($request->get('car_search') != null){
            $search = $request->get('car_search');

            $query = Car::with(['Category'])
            ->Where('cars.name', 'LIKE', '%'.$search.'%')
            ->where(['cars.status'=> true])
            ->select('*','cars.name as car_name', 'cars.image as car_image');

            $cars = $query->paginate(6);

            return view('front.cars', ['cars'=> $cars]);
        }
        else{
            $cars = Car::with(['Category'])
            ->where(['cars.status'=> true])
            ->select('*','cars.name as car_name', 'cars.image as car_image')->paginate(6);

            return view('front.cars', ['cars'=> $cars]);

        }

    }

    
    // show cars
    public function show($id)
    {
        $car = Car::find($id);
        if(!$car){
            return response()->json(['message'=>'Not found'],404);
        }
        return response()->json(['car'=>$car]);
    }

    public function convertDate($date){
        return date('y-m-d', strtotime($date));
    }

    public function convertTime($time){

        $trimTime = str_replace('AM',' AM', str_replace('PM', ' PM',str_replace(' ', '', $time)));

        $new_time = DateTime::createFromFormat('h:i A', $trimTime);
        $time_24 = $new_time->format('H:i:s');

        return $time_24;
    }
 
    public function reserve(Request $request){
        // return $request->post();

        // return $this->convertTime($request['pickup-time']);

        $order = new Order();
        $order->names = $request->input('names');
        $order->telphone = $request->input('telphone');
        $order->email = $request->input('email');
        $order->orderDate = Carbon::now();
        $order->car_id = $request->input('car_id');
        $order->pickup_place = $request->input('pickup');
        $order->pickoff_place = $request->input('pickoff');
        $order->pickup_date = $this->convertDate($request->input('pickup-date'));
        $order->pickoff_date = $this->convertDate($request->input('pickoff-date'));
        $order->pickup_time = $this->convertTime($request->input('pickup-time'));
        $order->pickoff_time = $this->convertTime($request->input('pickoff-time'));
        
        try {
            $order->save();
        } catch (\Throwable $exception) {
            //throw $th;
            return response()->json(['ex'=>$exception->errorInfo], 500);
        }
        return response()->json(['result'=> "ok"], 200);

    }
    

}
