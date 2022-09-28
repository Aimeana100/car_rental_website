<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Admin\Car;
use App\Models\Admin\Order;
use Illuminate\Http\Request;
use App\Models\Admin\Contact;
use App\Models\Admin\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

use Validator;


class AdminController extends Controller
{
    public function dashboard()
    {
    if(Auth::user()->hasRole('administrator')){
        $categories = Category::all();
        $cars = Car::all();
        $orders = Order::all();
        $contacts = Contact::all();
        return view('admin.dashboard',['categories'=>$categories, 'cars'=>$cars, 'contacts'=>$contacts, 'orders'=>$orders]);
    }

}






public function profile(Request $request){
    if(Auth::user()->hasRole('administrator')){
        return response()->json(['user'=> Auth::user()],200);
    }
}

public function updateProfile(Request $request){
    if(Auth::user()->hasRole('administrator')){
        $user = User::find(Auth::user()->id);
        $password = $request->input('password');

        $validator = Validator::make($request->all(), [
            'names' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required','confirmed', Rules\Password::defaults()],
        ]);

        if(!$validator->passes()){
            return response()->json([ 'result'=>"error", 'message'=>$validator->errors()->all()]);

        }else {

            $user->email = $request->input('email');
            $user->name = $request->input('names');
            $user->telphone = $request->input('profileTelphone');
            $user->password = Hash::make($password);
        }
        
        

        try {
            $user->save();

        } catch (\Throwable $exception) {
            return response()->json(['ex'=>$exception->errorInfo],500);
        }

        return response()->json(['result' => "ok"], 200);
    }
}


}
