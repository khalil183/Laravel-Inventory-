<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class CustomerController extends Controller
{
    public function addCustomer(){
        return view('addCustomer');
    }

    public function storeCustomerInfo(Request $req){
        $validatedData = $req->validate([
            'customer_name' => 'required|max:100|min:6',
            'customer_phone' => 'required|unique:customers|max:11|min:11',
            'customer_address' => 'required|max:255',
            'customer_shope_name' => 'required|max:100'
        ]);

        $customer=array();

        $customer['customer_name']=$req->customer_name;
        $customer['customer_phone']=$req->customer_phone;
        $customer['customer_email']=$req->customer_email;
        $customer['customer_address']=$req->customer_address;
        $customer['customer_shope_name']=$req->customer_shope_name;

        DB::table('customers')->insert($customer);

        $notification=array(
            'messege'=>'Customer Created SuccessfullY',
            'alert-type'=>'success'
             );
         return Redirect()->back()->with($notification);

    }


    public function allCustomer(){
        $customer=DB::table('customers')->get();
        return view('allCustomer',compact('customer'));
    }



    public function customerPayment(Request $req,$id){
        $payable_amount=$req->payable_amount;

        $customerInfo=DB::table('customers')->where('customer_id',$id)->first();
        $customerPay=$customerInfo->customer_payment + $payable_amount;
        $paymentStatus=DB::table('customers')->where('customer_id',$id)->update(['customer_payment'=>$customerPay]);

        if($paymentStatus){
            $notification=array(
                'messege'=>'Payment SuccessfullY',
                'alert-type'=>'success'
                 );
             return Redirect()->back()->with($notification);
        }
    }
}
