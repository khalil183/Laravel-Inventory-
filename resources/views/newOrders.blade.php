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
                        <h3 class="panel-title">New Orders</h3>

                        </div>

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Customer Name</th>
                                                <th>Phone</th>
                                                <th>Total Product</th>
                                                <th>Total Price</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            <?php $i=1 ?>
                                            @foreach($orders as $row)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$row->customer_name}}</td>
                                                <td>{{$row->customer_phone}}</td>
                                                <td>{{$row->total_product}}</td>
                                                <td>{{$row->total_price}} TK</td>
                                                <td><span class="badge badge-info">{{$row->order_status}}</span></td>
                                                <td>


                                                    <a href="{{url('/confirm-order/'.$row->order_id)}}" class="btn btn-primary">Confirm</a>

                                                    <a href="{{url('/view/order/'.$row->order_id)}}" class="btn btn-success">View</a>

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
