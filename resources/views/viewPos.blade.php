@extends('layouts.app')
@section('admin_content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">
             <!-- Page-Title -->
             <div class="row">
                 <div class="col-md-4 col-md-offset-4">
                    <h1 class="text-center text-white" style="background:rgb(3, 106, 119)">Point of Sell</h1>
                 </div>

            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="price_card text-center">
                        <div id="cartUpdate">
                        <table class="table table-bordered">
                            <thead class="bg-info">
                                <tr>
                                    <th class="text-white">Name</th>
                                    <th class="text-white">Price</th>
                                    <th class="text-white">Qty</th>
                                    <th class="text-white">Sub Total</th>
                                    <th class="text-white">Action</th>
                                </tr>
                            </thead>
                            <tbody id="body">
                                @foreach ($cartContent as $item)
                                    <tr>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->price}}</td>
                                        <td>
                                        <form action="{{url('/update-product/'.$item->rowId)}}" method="post">
                                            @csrf
                                                <input style="width:50px" type="number" value="{{$item->qty}}" name="qty">
                                                <button type="submit" style="margin-top: -5px" class="btn btn-primary btn-sm"><i class="fa fa-check" aria-hidden="true"></i></button>
                                            </form>
                                        </td>
                                        <td>{{$item->price * $item->qty}}</td>
                                        <td><a href="{{url('/delete-item/'.$item->rowId)}}" class="btn btn-danger btn-sm"><span> <i class="fa fa-trash" aria-hidden="true"></i></span></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pricing-header bg-success" >
                            <h3 class="text-white mt-2">Total Product: {{Cart::count()}}</h3>
                            <h2 class="text-white">Sub Total: {{Cart::subtotal()}} Tk</h2>
                            <h1 class="text-white">Vat: {{Cart::tax()}} Tk</h1>
                            <span class="price">Total: {{Cart::total()}} Tk</span>
                        </div>


                        </div>

                        <div>
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                            <h3 class="text-primary">Select Customer  <button data-toggle="modal" data-target="#newCustomer" class="btn btn-primary pull-right mt-4">Add New</button></h3>
                        </div>

                        <form action="{{url('/create-invoice')}}" method="POST">
                            @csrf
                            <select name="customer_id" id="" class="form-control">
                                <option value="">Select Customer</option>
                                @foreach ($customers as $item)
                            <option value="{{$item->customer_id}}">{{$item->customer_name}}</option>
                                @endforeach
                            </select>

                            <button type="submit" class="btn btn-primary waves-effect waves-light w-md">Create Invoice</button>
                        </form>


                    </div> <!-- end Pricing_card -->

                </div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Products Table</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable" class="table table-striped table-bordered table-responsive">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Image</th>
                                                <th>Price</th>
                                                <th>Qty</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            @foreach ($products as $item)
                                                <tr>
                                                    <td>{{$item->product_name}}</td>
                                                    <td><img width="50px" src="{{url($item->product_image)}}" alt=""></td>
                                                    <td>{{$item->sell_price}} Tk</td>
                                                    <td>{{$item->product_qty}}</td>
                                                    <td class="pull-right">

                                                    <input style="width:50px" type="number" value="1" name="qty" id="qty-{{$item->product_id}}">
                                                    <button onclick="addToCart({{$item->product_id}})" type="submit" style="margin-top: -5px" class="btn btn-success btn-sm"><i class="fa fa-plus" aria-hidden="true"></i></button>
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



<!-- Modal -->
<div class="modal fade" id="newCustomer" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h3 class="modal-title">Add New Customer</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="post" action="{{url('/store-customer-info')}}" class="form-horizontal" role="form">
                        @csrf
                            <div class="form-group">
                                <label for="Customer Name" class="col-sm-3 control-label">Customer Name</label>
                                <div class="col-sm-9">
                                    <input type="text"  required class="form-control" name="customer_name" id="Customer Name" placeholder="Customer Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Customer Phone" class="col-sm-3 control-label">Customer Phone</label>
                                <div class="col-sm-9">
                                    <input type="text" required class="form-control" id="Customer Phone" placeholder="Customer Phone" name="customer_phone">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Customer Email" class="col-sm-3 control-label">Customer Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="Customer Email" placeholder="Customer Email" name="customer_email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Customer Address" class="col-sm-3 control-label">Customer Address</label>
                                <div class="col-sm-9">
                                    <input required type="text" class="form-control" id="Customer Address" name="customer_address" placeholder="Customer Address">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="Customer Shop Name" class="col-sm-3 control-label">Customer Shop Name</label>
                                <div class="col-sm-9">
                                    <input required type="text" class="form-control" id="Customer Shop Name" name="customer_shope_name" placeholder="Customer Shop Name">
                                </div>
                            </div>

                            {{-- <div class="form-group m-b-0">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <button type="submit" class="btn btn-info waves-effect waves-light">ADD Supplyer</button>
                                </div>
                            </div> --}}

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add Customer</button>
            </div>
        </form>
        </div>
    </div>
</div>

<script>
    $('#exampleModal').on('show.bs.modal', event => {
        var button = $(event.relatedTarget);
        var modal = $(this);
        // Use above variables to manipulate the DOM

    });


    function loadData(id="test"){
        $.ajax({
                type:"get",
                url:"{{url('load-data')}}",
                data:{id:id},
                success:function(response){
                    // toastr.success(response.success)
                    // console.log(response);
                    $("#body").append(response)

                }
            })
    }


    function addToCart(id){
        $.ajaxSetup({
                headers:{'X-CSRF-Token':'{{csrf_token()}}'}
        });
        var qty=$('#qty-'+id).val();
        $.ajax({
            type:"post",
            url:"{{url('add-to-cart')}}",
            data:{product_id:id,product_qty:qty},
            success:function(response){

                if(response.error){
                    toastr.error(response.error)
                }else{
                    $("#cartUpdate").html(response)
                    // $("#body").append(response)
                    toastr.success('Product Added Successfully')
                }


            }

        })

        // $.ajax({
        //         type:"get",
        //         url:"{{url('/load-cart-data')}}",
        //         success:function(res){
        //             console.log(res);

        //             // $("#cartUpdate").html(res)
        //             // document.getElementById("result").innerHTML= res ;
        //             // alert(res)
        //         }
        //     })


    }


    function cartLoadData(){

    }
</script>
@endsection
