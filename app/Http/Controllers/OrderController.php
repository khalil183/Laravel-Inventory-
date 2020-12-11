<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
class OrderController extends Controller
{
    public function newOrder(){
        $orders=DB::table('orders')
                    ->join('customers','orders.customer_id','customers.customer_id')
                    ->where('order_status','pending')
                    ->orderBy('order_id','DESC')
                    ->get();

        return view('newOrders',compact('orders'));
    }


    public function viewOrder($id){
        $order=DB::table('orders')
        ->join('customers','orders.customer_id','customers.customer_id')
        ->where('orders.order_id',$id)
        ->first();
        $order_details=DB::table('order_details')
                            ->join('products','order_details.product_id','products.product_id')
                            ->select('order_details.*','products.product_name','products.sell_price')
                            ->where('order_id',$order->order_id)->get();


        return view('viewOrder',compact('order','order_details'));
    }

    public function confirmOrder($id){
        DB::table('orders')->where('order_id',$id)->update(['order_status'=>'Success']);

        return Redirect::to('/view/order/'.$id);
    }



    public function allOrders(){
        $orders=DB::table('orders')
        ->join('customers','orders.customer_id','customers.customer_id')
        ->orderBy('order_id','DESC')
        ->get();

        return view('allOrders',compact('orders'));
    }
}
