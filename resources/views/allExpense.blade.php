@extends('layouts.app')
@section('admin_content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Expense</h3>

                        </div>

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-3" style="padding:10px;background:rgb(11, 145, 155);margin-bottom:10px">
                                    <form action="{{url('/expense-of-day')}}" method="POST">
                                        @csrf
                                        <div class="card">
                                            <div class="card-body py-5">
                                                <div class="form-group">
                                                    <label for="date">Search For Daily Expense</label>
                                                    <input required type="date" name="date" id="date" class="form-control" placeholder="Select Date">
                                                    <button type="submit" class="btn btn-warning" style="margin-top: 25px">Search</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-3 col-md-offset-1" style="padding:10px;background:rgb(11, 145, 155);margin-bottom:10px">
                                    <form action="{{url('/expense-of-month')}}" method="POST">
                                        @csrf
                                        <div class="card">
                                            <div class="card-body py-5">
                                                <div class="form-group">
                                                    <label for="date">Search for Monthly Expense</label>
                                                    <select required name="month" id="month" class="form-control">
                                                        <option value="">Select Month</option>
                                                         <option value="January">January</option>
                                                         <option value="February">February</option>
                                                         <option value="March">March</option>
                                                         <option value="April">April</option>
                                                         <option value="May">May</option>
                                                         <option value="June">June</option>
                                                         <option value="July">July</option>
                                                         <option value="August">August</option>
                                                         <option value="September">September</option>
                                                         <option value="October">October</option>
                                                         <option value="November">November</option>
                                                         <option value="December">December</option>
                                                    </select>
                                                    <button type="submit" class="btn btn-warning" style="margin-top: 25px">Search</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="col-md-3 col-md-offset-1" style="padding:10px;background:rgb(11, 145, 155);margin-bottom:10px">
                                    <form action="{{url('/expense-of-year')}}" method="POST">
                                        @csrf
                                        <div class="card">
                                            <div class="card-body py-5">
                                                <div class="form-group">
                                                    <label for="date">Search For Yearly Expense</label>
                                                    <input required type="text" name="year" id="year" class="form-control" placeholder="{{date('Y')}}">
                                                    <button type="submit" class="btn btn-warning" style="margin-top: 25px">Search</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>


                            </div>

                            <br>
                            <br>
                            <?php
                                if($total_expense){
                                    echo "<h3 class='text-danger'>Total Expense: $total_expense Tk </h3>";
                                }

                                if($monthly_expense){
                                    echo "<h3 class='text-danger'>Expense of $month: $monthly_expense Tk </h3>";
                                }

                                if($dateExpense){
                                    echo "<h3 class='text-danger'>Expense of $date : $dateExpense Tk </h3>";
                                }

                                if($yearly_expense){
                                    echo "<h3 class='text-danger'>Expense of $year : $yearly_expense Tk </h3>";
                                }
                            ?>
                            <br>
                            <br>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>EXpense Amount</th>
                                                <th>Details</th>
                                                <th>Expense Date</th>
                                                <th>EXpense Month</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            @php
                                                $i=1;
                                            @endphp
                                            @foreach ($expense as $item)
                                                <tr>
                                                    <td>{{$i++}}</td>
                                                    <td>{{$item->expense_amount}} Tk</td>
                                                    <td>{{$item->expense_details}}</td>
                                                    <td>{{$item->expense_day}}</td>
                                                    <td>{{$item->expense_month}}</td>
                                                    <td>
                                                        <a href="#" class="btn btn-info">View</a>
                                                        <a href="#" class="btn btn-success">Edit</a>
                                                        <a href="#" class="btn btn-danger">Delete</a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- End Row -->

        </div> <!-- container -->

    </div> <!-- content -->

    <footer class="footer text-right">
        2015 © Moltran.
    </footer>

</div>
@endsection
