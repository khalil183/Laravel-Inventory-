<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use Illuminate\Support\Facades\Redirect;
class CartController extends Controller
{
    public function viewPos(){
        $products=DB::table('products')->get();
        $customers=DB::table('customers')->get();
        $cartContent=Cart::content();
        return view('viewPos',compact('products','cartContent','customers'));
    }

    // public function addCart(Request $req,$id){
    //     $product=DB::table('products')->where('product_id',$id)->first();
    //     if($product->product_qty >'0'){
    //         $data=array();
    //         $data['id']=$id;
    //         $data['name']=$product->product_name;
    //         $data['qty']=$req->qty;
    //         $data['price']=$product->sell_price;
    //         $data['weight']=1;

    //         Cart::add($data);

    //         $notification=array(
    //             'messege'=>'Product Added SuccessfullY',
    //             'alert-type'=>'success'
    //             );
    //         return Redirect()->back()->with($notification);
    //     }else{
    //         $notification=array(
    //             'messege'=>'Opps!! Product Not Available.',
    //             'alert-type'=>'error'
    //             );
    //         return Redirect()->back()->with($notification);
    //     }

    // }

    public function deleteItem($id){
        Cart::remove($id);
        $notification=array(
            'messege'=>'Product Delete SuccessfullY',
            'alert-type'=>'success'
             );
         return Redirect()->back()->with($notification);
    }

    public function updateItem(Request $req,$id){
        Cart::update($id,$req->qty);
        $notification=array(
            'messege'=>'Product Updated SuccessfullY',
            'alert-type'=>'success'
             );
         return Redirect()->back()->with($notification);
    }

    public function createInvoice(Request $req){
        $validatedData = $req->validate([
            'customer_id' => 'required'
        ]);

        $customerInfo=DB::table('customers')->where('customer_id',$req->customer_id)->first();
        $products=Cart::content();

        return view('invoice',compact('customerInfo','products'));
    }

    public function confirmInvoice(Request $req){


        $order=array();
        $order['customer_id']=$req->customer_id;
        $order['total_product']=Cart::count();
        $order['total_price']=Cart::total();
        $order['payment_method']=$req->payment_method;
        $order['payable_amount']=$req->payable_amount;
        $order['due_amount']=$req->due_amount;

        $customerInfo=DB::table('customers')->where('customer_id',$req->customer_id)->first();

        $customer_payment=$customerInfo->customer_payment;
        $customer_payment += $req->payable_amount;
        $customer_total=$customerInfo->customer_total+ $req->payable_amount + $req->due_amount;
        $customer=array();
        $customer['customer_payment']=$customer_payment;
        $customer['customer_total']=$customer_total;
        DB::table('customers')->where('customer_id',$req->customer_id)->update($customer);


        $order_id=DB::table('orders')->insertGetid($order);
        if($order_id){
            $cartContent=Cart::content();
            $orderDetails=array();
            foreach($cartContent as $row){
                $orderDetails['order_id']=$order_id;
                $orderDetails['product_id']=$row->id;
                $orderDetails['product_qty']=$row->qty;

                $date=date('Y-m-d');
                $orderDetails['order_day']=$date;
                $orderDetails['order_year']=date('Y',strtotime($date));
                $orderDetails['order_month']=date('F',strtotime($date));

                $pQty=DB::table('products')->where('product_id',$row->id)->first();
                $pQty=$pQty->product_qty - $row->qty;
                DB::table('products')->where('product_id',$row->id)->update(['product_qty'=>$pQty]);


                $details=DB::table('order_details')->insert($orderDetails);
            }

            if($details){
                Cart::destroy();

                $notification=array(
                    'messege'=>'Order Created SuccessfullY',
                    'alert-type'=>'success'
                    );
                return Redirect::to('/new-order')->with($notification);
            }else{
                $notification=array(
                    'messege'=>'Order Created SuccessfullY',
                    'alert-type'=>'success'
                    );
                return Redirect()->back()->with($notification);
            }



        }else{
            $notification=array(
                'messege'=>'Opps!! Order Created Faild.',
                'alert-type'=>'error'
                );
            return Redirect()->back()->with($notification);
        }



    }




    public function addCart(Request $req){
        $product=DB::table('products')->where('product_id',$req->product_id)->first();
        if($product->product_qty >'0'){

            $checkCart=Cart::content();
            $checkId="";
            foreach($checkCart as $car_row){
                if($car_row->id == $req->product_id){
                    $checkId .=$car_row->id;
                }
            }
            if($checkId){
                return response()->json(['error'=>'Product Allready Addedd.']);
            }else{
                $data=array();
                $data['id']=$req->product_id;
                $data['name']=$product->product_name;
                $data['qty']=$req->product_qty;
                $data['price']=$product->sell_price;
                $data['weight']=1;

                $success=Cart::add($data);
                $content=Cart::content();
                foreach($content as $row){
                    if($row->id == $req->product_id){
                        $rowId=$row->rowId;
                    }
                }
                $data['rowId']=$rowId;
                return view('showNewData',compact('data'));
            }

        }else{
            return response()->json(['error'=>'Opppsss!! Product Stock Out.']);
        }

    }



    public function loadCartData(){
        // $cartTotal=Cart::total();
        // $cartCount=Cart::count();
        $update=array();
        $update['cartTotal']=Cart::total();
        $update['cartCount']=Cart::count();
        return Response()->json($update);
        // return view('loadCartData',compact('cartTotal','cartCount'));
    }
}
