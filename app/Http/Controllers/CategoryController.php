<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class CategoryController extends Controller
{
    public function addCategory(){
        return view('addCategory');
    }

    public function storeCategory(Request $req){

        $validatedData = $req->validate([
            'category_name' => 'required|unique:categories'
        ]);


        DB::table('categories')->insert(['category_name'=>$req->category_name]);

        $notification=array(
            'messege'=>'Category Created SuccessfullY',
            'alert-type'=>'success'
             );
         return Redirect()->back()->with($notification);

    }


    public function allCategory(){
        $category=DB::table('categories')->get();

        return view('allCategory',compact('category'));
    }
}
