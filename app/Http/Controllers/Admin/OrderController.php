<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index(){

        $orders = Order::with('car')->orderBy('orders.orderDate','DESC')->get();
        // dd($orders);
        return view('admin.orders');

    }

    public function generalList(){
        $orders = Order::with('car')->orderBy('orders.orderDate','DESC')->get();

        return response()->json(['orders'=>$orders], 200);
    }

    public function show($id){
        $order = Order::with('car')->where(['orders.id'=>$id])->orderBy('orderDate','desc')->get();

        if(!$order){
            return response()->json(['message'=>'Not found'],404);
        }

        return response()->json(['order'=>$order], 200);

    }


}
