<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ExpenseController extends Controller
{
    public function addExpense(){
        return view('addExpense');
    }

    public function storeExpense(Request $req){

        $data=array();
        $data['expense_amount']=$req->expense_amount;
        $data['expense_details']=$req->expense_details;
        $data['expense_day']=$req->expense_day;
        $data['expense_year']=date('Y',strtotime($req->expense_day));
        $data['expense_month']=date('F',strtotime($req->expense_day));

        DB::table('expenses')->insert($data);
        $notification=array(
            'messege'=>'Expense Created SuccessfullY',
            'alert-type'=>'success'
            );
        return Redirect()->back()->with($notification);

    }


    public function allExpense(){
        $expense=DB::table('expenses')->orderBy('expense_id','DESC')->get();
        $total_expense=DB::table('expenses')->SUM('expense_amount');
        $monthly_expense='';
        $dateExpense='';
        $yearly_expense='';
        return view('allExpense',compact('expense','total_expense','monthly_expense','dateExpense','yearly_expense'));

    }

    public function expensOfDay(Request $req){
        $date=$req->date;
        $expense=DB::table('expenses')->where('expense_day',$date)->orderBy('expense_id','DESC')->get();
        $dateExpense=DB::table('expenses')->where('expense_day',$date)->SUM('expense_amount');
        $total_expense='';
        $monthly_expense='';
        $yearly_expense='';
        $date=date('d F',strtotime($date));
        return view('allExpense',compact('expense','total_expense','monthly_expense','dateExpense','date','yearly_expense'));
    }


    public function expensOfMonth(Request $req){
        $month=$req->month;
        $year=date('Y');
        $expense=DB::table('expenses')
                    ->where('expense_month',$month)
                    ->where('expense_year',$year)
                    ->orderBy('expense_id','DESC')
                    ->get();
        $monthly_expense=DB::table('expenses')
                    ->where('expense_month',$month)
                    ->where('expense_year',$year)
                    ->SUM('expense_amount');
        $total_expense='';
        $dateExpense='';
        $yearly_expense='';


        return view('allExpense',compact('expense','total_expense','monthly_expense','month','dateExpense','yearly_expense'));

    }

    public function expensOfYear(Request $req){
        $year=$req->year;
        $expense=DB::table('expenses')->where('expense_year',$year)->orderBy('expense_id','DESC')->get();
        $yearly_expense=DB::table('expenses')->where('expense_year',$year)->SUM('expense_amount');
        $total_expense='';
        $dateExpense='';
        $monthly_expense='';


        return view('allExpense',compact('expense','total_expense','monthly_expense','year','dateExpense','yearly_expense'));


    }
}
