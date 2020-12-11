@extends('layouts.app')
@section('admin_content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card bg-info" style="padding:10px;background:rgb(11, 145, 155);margin-bottom:10px">
                                    <div class="card-body">
                                        <form action="{{url('/sell-by-date')}}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="date">Searh For ToDay Sells Report</label>
                                                <input required type="date" name="date" id="date" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-outline-success" type="submit">Search</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card bg-info" style="padding:10px;background:rgb(6, 137, 155);margin-bottom:10px">
                                    <div class="card-body">
                                        <form action="{{url('/sell-by-month')}}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="month">Searh For Monthly Sells Report</label>
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
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-outline-success" type="submit">Search</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card bg-info" style="padding:10px;background:rgb(11, 145, 155);margin-bottom:10px">
                                    <div class="card-body">
                                        <form action="{{url('/sell-by-year')}}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="year">Searh For ToDay Sells Report</label>
                                            <input required type="text" name="year" id="year" class="form-control" placeholder="{{date('Y')}}">
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-outline-success" type="submit">Search</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card bg-success" style="height:130px;padding:20px 10px;margin-bottom:10px">
                                    <div class="card-body py-5 ">
                                        <h4 class="text-white text-center">{{$date}} Sell:</h4>
                                        <h4 class="text-white text-center">{{$totalSell}} Tk</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card bg-info" style="height:130px;padding:20px 10px;margin-bottom:10px">
                                    <div class="card-body py-5 ">
                                        <h4 class="text-white text-center">{{$date}} Purchase:</h4>
                                        <h4 class="text-white text-center">{{$purchasePrice}}</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="card bg-danger" style="height:130px;padding:20px 10px;margin-bottom:10px">
                                    <div class="card-body py-5 ">
                                        <h4 class="text-white text-center">{{$date}} Expanse:</h4>
                                        <h4 class="text-white text-center">{{$toDayExpense}} Tk</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="card bg-primary" style="height:130px;padding:20px 10px;margin-bottom:10px">
                                    <div class="card-body py-5 ">
                                        <h4 class="text-white text-center">{{$date}} Profit:</h4>
                                        <h4 class="text-white text-center">{{$toDayProfit}} Tk</h4>
                                    </div>
                                </div>
                            </div>










                        </div>
                        <div class="panel-heading">
                            <?php
                                if($date){
                                    echo "<h3 class='text-success'>Top Sell Products in $date :-</h3>";
                                }



                            ?>
                        </div>

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="table-responsive">
                                        <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Product Name</th>
                                                <th>Image</th>
                                                <th>Selling Price</th>
                                                <th>Selling Qty</th>
                                                <th>Total Sell</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            <?php $i=1 ?>
                                            @foreach($sell as $row)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$row->product_name}}</td>
                                                <td><img src="{{url($row->product_image)}}" width="50px" alt=""></td>
                                                <td>{{$row->sell_price}}</td>
                                                <td>{{$row->product_qty}}</td>
                                                <td>{{$row->product_qty * $row->sell_price}} Tk</td>


                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                    </div>

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
