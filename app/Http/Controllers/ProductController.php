<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ProductController extends Controller
{
    public function addPurchase(){
        $supplyer=DB::table('supplyers')->get();
        $category=DB::table('categories')->get();
        return view('addPurchase',compact('supplyer','category'));
    }

    public function storePurchaseProduct(Request $req){
        $validatedData = $req->validate([
            'supplyer_id' => 'required',
            'product_name' => 'required|unique:products',
            'product_code' => 'required|unique:products',
            'purchase_price' => 'required',
            'product_qty' => 'required',
            'category_id' => 'required',
            'sell_price' => 'required',


        ]

    );

        $purchase=array();
        $purchase['supplyer_id']=$req->supplyer_id;
        $purchase['product_name']=$req->product_name;
        $purchase['product_code']=$req->product_code;
        $purchase['purchase_price']=$req->purchase_price;
        $purchase['product_qty']=$req->product_qty;
        $purchase['category_id']=$req->category_id;
        $purchase['sell_price']=$req->sell_price;
        $purchase['purchase_day']=date('Y-m-d');
        $purchase['purchase_month']=date('F');
        $purchase['purchase_year']=date('Y');



        $image=$req->file('product_image');

        if($image){
            $image_name=date('d-m-y-h-i-s-').rand(9999,99999);
            $img_ext=strtolower($image->getClientOriginalExtension());
            $img_full_name=$image_name.'.'.$img_ext;
            $path='public/images/';
            $url=$path.$img_full_name;
            $image->move($path,$img_full_name);
            $purchase['product_image']=$url;

            $addSuccess=DB::table('products')->insert($purchase);
            if($addSuccess){
                $total_price=$req->purchase_price * $req->product_qty;
                $supplyer_info=DB::table('supplyers')->where('supplyer_id',$req->supplyer_id)->first();
                $supplyer_total=$supplyer_info->supplyer_total + $total_price;
                DB::table('supplyers')->where('supplyer_id',$req->supplyer_id)->update(['supplyer_total'=>$supplyer_total]);

                $notification=array(
                    'messege'=>'Product Purchase SuccessfullY',
                    'alert-type'=>'success'
                    );
                return Redirect()->back()->with($notification);
            }else{
                $notification=array(
                    'messege'=>'Oppps!!! Product Purchase Faild.',
                    'alert-type'=>'error'
                     );
                 return Redirect()->back()->with($notification);
            }
        }else{
            $notification=array(
                'messege'=>'Oppps!!! Product Purchase Faild.',
                'alert-type'=>'error'
                 );
             return Redirect()->back()->with($notification);
        }







    }



    public function allPurchase(){
        $purchase=DB::table('products')
                    ->join('supplyers','products.supplyer_id','supplyers.supplyer_id')
                    ->join('categories','products.category_id','categories.category_id')
                    ->select('products.*','supplyers.supplyer_name','categories.*')
                    ->get();
        return view('allPurchase',compact('purchase'));
    }

}
