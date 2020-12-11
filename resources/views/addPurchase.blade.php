@extends('layouts.app')
@section('admin_content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <div class="row">
                <!-- Horizontal form -->
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h1 class="panel-title text-center">Purchase Product</h1></div>
                        <div class="panel-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                            <form method="post" action="{{url('/store-purchase-product')}}" class="form-horizontal" role="form" enctype="multipart/form-data">
                            @csrf
                                <div class="form-group">
                                    <label for="Select Supplyer" class="col-sm-3 control-label">Supplyer Name</label>
                                    <div class="col-sm-9">
                                        <select name="supplyer_id"  required id="Select Supplyer" class="form-control">
                                            <option value="">Select Supplyer Name</option>
                                            @foreach ($supplyer as $item)

                                                 <option value="{{$item->supplyer_id}}">{{$item->supplyer_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="Select Category" class="col-sm-3 control-label">Category Name</label>
                                    <div class="col-sm-9">
                                        <select name="category_id"   id="Select Category" class="form-control">
                                            <option value="">Select Category Name</option>
                                            @foreach ($category as $cat_item)
                                                 <option value="{{$cat_item->category_id}}">{{$cat_item->category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="Product name" class="col-sm-3 control-label">Product name</label>
                                    <div class="col-sm-9">
                                        <input type="text" required  class="form-control" id="Product name" placeholder="Product name" name="product_name">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="Product Code" class="col-sm-3 control-label">Product Code</label>
                                    <div class="col-sm-9">
                                        <input type="text" required  class="form-control" id="Product Code" placeholder="Product Code" name="product_code">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="Purchase Price" class="col-sm-3 control-label">Purchase Price</label>
                                    <div class="col-sm-9">
                                        <input type="number"  required class="form-control" id="Purchase Price" placeholder="Purchase Price" name="purchase_price">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="Selling Price" class="col-sm-3 control-label">Selling Price</label>
                                    <div class="col-sm-9">
                                        <input type="number"   class="form-control" id="Selling Price" placeholder="Selling Price" name="sell_price">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="Product Quantity" class="col-sm-3 control-label">Product Quantity</label>
                                    <div class="col-sm-9">
                                        <input type="number"  required class="form-control" id="Product Quantity" placeholder="Product Quantity" name="product_qty">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="Product Image" class="col-sm-3 control-label">Product Image</label>
                                    <div class="col-sm-9">
                                        <input type="file"   class="form-control" id="Product Image" name="product_image">
                                    </div>
                                </div>

                                <div class="form-group m-b-0">
                                    <div class="col-sm-offset-3 col-sm-9">
                                        <button type="submit" class="btn btn-info waves-effect waves-light">Purchase</button>
                                    </div>
                                </div>
                            </form>
                        </div> <!-- panel-body -->
                    </div> <!-- panel -->
                </div> <!-- col -->

             </div>


        </div> <!-- container -->

    </div> <!-- content -->

    <footer class="footer text-right">
        2015 © Moltran.
    </footer>

</div>
@endsection
