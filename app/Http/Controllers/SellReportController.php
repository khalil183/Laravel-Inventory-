<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class SellReportController extends Controller
{
    public function toDaySellReport(){
        $date=date('Y-m-d');
        $sell=DB::table('order_details')
                ->join('products','order_details.product_id','products.product_id')
                ->join('orders','order_details.order_id','orders.order_id')
                ->select('order_details.*','products.product_id','products.product_image','products.sell_price','products.product_name','products.purchase_price')
                ->orderBy('order_details.product_qty','DESC')
                ->where('order_day',$date)->get();
        $purchaseReport=0;
        $totalSell=0;
        foreach($sell as $row){
            $pprice=$row->purchase_price * $row->product_qty;
            $purchaseReport +=$pprice;

            $sprice=$row->sell_price * $row->product_qty;
            $totalSell +=$sprice;
        }
        $toDayProfit=$totalSell - $purchaseReport;
        $toDayExpense=DB::table('expenses')->where('expense_day',$date)->SUM('expense_amount');

        $purchaseProduct=DB::table('products')->where('purchase_day',$date)->get();
        $purchasePrice=0;
        foreach($purchaseProduct as $p_row){
            $purchasePrice += $p_row->product_qty * $p_row->purchase_price;
        }


        $date="ToDay";
        return view('toDaySell',compact('sell','toDayProfit','totalSell','toDayExpense','date','purchasePrice'));
    }

    public function sellByDate(Request $req){
        $date=$req->date;
        $sell=DB::table('order_details')
                ->join('products','order_details.product_id','products.product_id')
                ->join('orders','order_details.order_id','orders.order_id')
                ->select('order_details.*','products.product_id','products.product_image','products.sell_price','products.product_name','products.purchase_price')
                ->orderBy('order_details.product_qty','DESC')
                ->where('order_day',$date)->get();
        $purchaseReport=0;
        $totalSell=0;
        foreach($sell as $row){
            $pprice=$row->purchase_price * $row->product_qty;
            $purchaseReport +=$pprice;

            $sprice=$row->sell_price * $row->product_qty;
            $totalSell +=$sprice;
        }
        $toDayProfit=$totalSell - $purchaseReport;
        $toDayExpense=DB::table('expenses')->where('expense_day',$date)->SUM('expense_amount');

        $purchaseProduct=DB::table('products')->where('purchase_day',$date)->get();
        $purchasePrice=0;
        foreach($purchaseProduct as $p_row){
            $purchasePrice += $p_row->product_qty * $p_row->purchase_price;
        }


        $date=date('d M Y',strtotime($date));
        return view('toDaySell',compact('sell','toDayProfit','totalSell','toDayExpense','date','purchasePrice'));

    }

    public function sellByMonth(Request $req){
        $date=$req->month;
        $sell=DB::table('order_details')
                ->join('products','order_details.product_id','products.product_id')
                ->join('orders','order_details.order_id','orders.order_id')
                ->select('order_details.*','products.product_id','products.product_image','products.sell_price','products.product_name','products.purchase_price')
                ->orderBy('order_details.product_qty','DESC')
                ->where('order_month',$date)->get();
        $purchaseReport=0;
        $totalSell=0;
        foreach($sell as $row){
            $pprice=$row->purchase_price * $row->product_qty;
            $purchaseReport +=$pprice;

            $sprice=$row->sell_price * $row->product_qty;
            $totalSell +=$sprice;
        }
        $toDayProfit=$totalSell - $purchaseReport;
        $year=date('Y');
        $toDayExpense=DB::table('expenses')
                        ->where('expense_month',$date)
                        ->where('expense_year',$year)
                        ->SUM('expense_amount');

        $purchaseProduct=DB::table('products')
                        ->where('purchase_month',$date)
                        ->where('purchase_year',$year)
                        ->get();
        $purchasePrice=0;
        foreach($purchaseProduct as $p_row){
            $purchasePrice += $p_row->product_qty * $p_row->purchase_price;
        }


        $date=$date.' month';
        return view('toDaySell',compact('sell','toDayProfit','totalSell','toDayExpense','date','purchasePrice'));
    }

    public function sellByYear(Request $req){
        $date=$req->year;
        $sell=DB::table('order_details')
                ->join('products','order_details.product_id','products.product_id')
                ->join('orders','order_details.order_id','orders.order_id')
                ->select('order_details.*','products.product_id','products.product_image','products.sell_price','products.product_name','products.purchase_price')
                ->orderBy('order_details.product_qty','DESC')
                ->where('order_year',$date)->get();
        $purchaseReport=0;
        $totalSell=0;
        foreach($sell as $row){
            $pprice=$row->purchase_price * $row->product_qty;
            $purchaseReport +=$pprice;

            $sprice=$row->sell_price * $row->product_qty;
            $totalSell +=$sprice;
        }
        $toDayProfit=$totalSell - $purchaseReport;
        $toDayExpense=DB::table('expenses')
                        ->where('expense_year',$date)
                        ->SUM('expense_amount');

        $purchaseProduct=DB::table('products')
                        ->where('purchase_year',$date)
                        ->get();
        $purchasePrice=0;
        foreach($purchaseProduct as $p_row){
            $purchasePrice += $p_row->product_qty * $p_row->purchase_price;
        }


        $date=$date.' Year';
        return view('toDaySell',compact('sell','toDayProfit','totalSell','toDayExpense','date','purchasePrice'));
    }


}
