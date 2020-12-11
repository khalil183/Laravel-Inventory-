@extends('layouts.app')
@section('admin_content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <div class="row">
                <div class="col-md-3">
                    <div class="card bg-success" style="height:130px;padding:20px 10px;margin-bottom:10px">
                        <div class="card-body py-5 ">
                            <h4 class="text-white text-center">Today Sell:</h4>
                            <h4 class="text-white text-center">1200 Tk</h4>
                        </div>
                    </div>
                </div>
               <div class="col-md-3">
                    <div class="card bg-info" style="height:130px;padding:20px 10px;margin-bottom:10px">
                        <div class="card-body py-5 ">
                            <h4 class="text-white text-center"> ToDay Purchase:</h4>
                            <h4 class="text-white text-center">500 Tk</h4>
                        </div>
                    </div>
                </div>
               <div class="col-md-3">
                    <div class="card bg-danger" style="height:130px;padding:20px 10px;margin-bottom:10px">
                        <div class="card-body py-5 ">
                            <h4 class="text-white text-center"> To Day Expense:</h4>
                            <h4 class="text-white text-center">120 Tk</h4>
                        </div>
                    </div>
                </div>
               <div class="col-md-3">
                    <div class="card bg-success" style="height:130px;padding:20px 10px;margin-bottom:10px">
                        <div class="card-body py-5 ">
                            <h4 class="text-white text-center"> To Day Profit:</h4>
                            <h4 class="text-white text-center">25000 Tk</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card" style="height:130px;padding:20px 10px;margin-bottom:10px;background:rgb(24, 79, 116)">
                        <div class="card-body py-5 ">
                            <h4 class="text-white text-center"> Monthly Purchase:</h4>
                            <h4 class="text-white text-center">3000 Tk</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card" style="height:130px;padding:20px 10px;margin-bottom:10px;background:rgb(45, 99, 69)">
                        <div class="card-body py-5 ">
                            <h4 class="text-white text-center"> Monthly Profit:</h4>
                            <h4 class="text-white text-center">480000 Tk</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card" style="height:130px;padding:20px 10px;margin-bottom:10px;background:rgb(3, 117, 112)">
                        <div class="card-body py-5 ">
                            <h4 class="text-white text-center"> Monthly Sell:</h4>
                            <h4 class="text-white text-center">780000 Tk</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card" style="height:130px;padding:20px 10px;margin-bottom:10px;background:rgb(115, 5, 167)">
                        <div class="card-body py-5 ">
                            <h4 class="text-white text-center"> Monthly Expense:</h4>
                            <h4 class="text-white text-center">7000 Tk</h4>
                        </div>
                    </div>
                </div>




                <div class="col-md-3">
                    <div class="card bg-danger" style="height:130px;padding:20px 10px;margin-bottom:10px">
                        <div class="card-body py-5 ">
                            <h4 class="text-white text-center"> Yearly Expense:</h4>
                            <h4 class="text-white text-center">2000 Tk</h4>
                        </div>
                    </div>
                </div>


               <div class="col-md-3">
                    <div class="card" style="height:130px;padding:20px 10px;margin-bottom:10px;background:rgb(4, 145, 150)">
                        <div class="card-body py-5 ">
                            <h4 class="text-white text-center"> Yearly Profit:</h4>
                            <h4 class="text-white text-center">11000 Tk</h4>
                        </div>
                    </div>
                </div>
               <div class="col-md-3">
                    <div class="card" style="height:130px;padding:20px 10px;margin-bottom:10px;background:rgb(24, 79, 116)">
                        <div class="card-body py-5 ">
                            <h4 class="text-white text-center"> Yearly Purchase:</h4>
                            <h4 class="text-white text-center">350000 Tk</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card" style="height:130px;padding:20px 10px;margin-bottom:10px;background:rgb(245, 149, 6)">
                        <div class="card-body py-5 ">
                            <h4 class="text-white text-center"> Yearly Sell:</h4>
                            <h4 class="text-white text-center">4500000 Tk</h4>
                        </div>
                    </div>
                </div>


            </div>
            <!-- End row-->

            {{-- <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Datatable</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Office</th>
                                                <th>Age</th>
                                                <th>Start date</th>
                                                <th>Salary</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            <tr>
                                                <td>Tiger Nixon</td>
                                                <td>System Architect</td>
                                                <td>Edinburgh</td>
                                                <td>61</td>
                                                <td>2011/04/25</td>
                                                <td>$320,800</td>
                                            </tr>


                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- End Row --> --}}


        </div> <!-- container -->

    </div> <!-- content -->

    <footer class="footer text-right">
        2015 © Moltran.
    </footer>

</div>
@endsection
