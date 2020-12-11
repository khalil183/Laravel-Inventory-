<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class SupplyerController extends Controller
{
    public function addSupplyer(){
        return view('addSupplyer');
    }

    public function storeSupplyerInfo(Request $req){


        $validatedData = $req->validate([
            'supplyer_name' => 'required|max:100|min:6',
            'supplyer_phone' => 'required|unique:supplyers|max:11|min:11',
            'supplyer_address' => 'required|max:255',
            'supplyer_shope_name' => 'required|max:100'
        ]);

        $supplyer=array();

        $supplyer['supplyer_name']=$req->supplyer_name;
        $supplyer['supplyer_phone']=$req->supplyer_phone;
        $supplyer['supplyer_email']=$req->supplyer_email;
        $supplyer['supplyer_address']=$req->supplyer_address;
        $supplyer['supplyer_shope_name']=$req->supplyer_shope_name;

        DB::table('supplyers')->insert($supplyer);

        $notification=array(
            'messege'=>'Supplyer Created SuccessfullY',
            'alert-type'=>'success'
             );
         return Redirect()->back()->with($notification);


    }


    public function allSupplyer(){
        $supplyer=DB::table('supplyers')->get();

        return view('allSupplyer',compact('supplyer'));
    }



    public function supplyerPayment(Request $req,$id){
        $payable_amount=$req->payable_amount;

        $supplyerInfo=DB::table('supplyers')->where('supplyer_id',$id)->first();
        $supplyerPay=$supplyerInfo->supplyer_payment + $payable_amount;
        $paymentStatus=DB::table('supplyers')->where('supplyer_id',$id)->update(['supplyer_payment'=>$supplyerPay]);

        if($paymentStatus){
            $notification=array(
                'messege'=>'Payment SuccessfullY',
                'alert-type'=>'success'
                 );
             return Redirect()->back()->with($notification);
        }
    }
}
