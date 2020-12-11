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
                            <h3 class="panel-title">All Products</h3>
                        </div>

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="table-responsive">
                                    <table id="datatable" class="table table-striped table-bordered table-responsive">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Supplyer Name</th>
                                                <th>Product Name</th>
                                                <th>Image</th>
                                                <th>Category</th>
                                                <th>Product Code</th>
                                                <th>Purchase Price</th>
                                                <th>Selling Price</th>
                                                <th>Product qty</th>
                                                <th>Total</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            <?php $i=1 ?>
                                            @foreach($purchase as $row)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$row->supplyer_name}}</td>
                                                <td>{{$row->product_name}}</td>
                                                <td><img width="60px" height="60px" src="{{url($row->product_image)}}" alt=""></td>
                                                <td>{{$row->category_name}}</td>
                                                <td>{{$row->product_code}}</td>
                                                <td>{{$row->purchase_price}} TK</td>
                                                <td>{{$row->sell_price}} TK</td>
                                                <td>{{$row->product_qty}}</td>
                                                <td>{{$row->purchase_price * $row->product_qty}} TK</td>

                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                          Action
                                                        </button>
                                                        <div class="dropdown-menu">
                                                          <a class="dropdown-item list-group-item bg-info" href="#">Action</a>
                                                          <a class="dropdown-item list-group-item bg-primary" href="#">Action</a>
                                                          <a class="dropdown-item list-group-item bg-success" href="#">Action</a>

                                                        </div>
                                                      </div>
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
                </div>

            </div> <!-- End Row -->

        </div> <!-- container -->

    </div> <!-- content -->

    <footer class="footer text-right">
        2015 © Moltran.
    </footer>

</div>
@endsection
