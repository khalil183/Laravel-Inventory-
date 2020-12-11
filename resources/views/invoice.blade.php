@extends('layouts.app')
@section('admin_content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <!-- <div class="panel-heading">
                            <h4>Invoice</h4>
                        </div> -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="pull-left m-t-30">
                                        <address>
                                            Customer Name: <strong>{{$customerInfo->customer_name}}</strong><br>
                                            Shope Name: <strong>{{$customerInfo->customer_shope_name}}</strong><br>
                                            Address: <strong>{{$customerInfo->customer_address}}</strong><br>
                                            Phone: <strong>{{$customerInfo->customer_phone}}</strong><br>


                                          </address>
                                    </div>
                                    <div class="pull-right m-t-30">
                                        <p><strong>Order Date: </strong> {{date('d-m-Y')}}</p>
                                        <p class="m-t-10"><strong>Order Status: </strong> <span class="label label-pink">Pending</span></p>

                                    </div>
                                </div>
                            </div>
                            <div class="m-h-50"></div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table m-t-30 table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Unit Cost</th>
                                                    <th>Quantity</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $i=1;
                                                @endphp
                                                @foreach ($products as $item)
                                                <tr>
                                                    <td>{{$i++}}</td>
                                                    <td>{{$item->name}}</td>
                                                    <td>{{$item->price}}</td>
                                                    <td>{{$item->qty}}</td>
                                                    <td>{{$item->price * $item->qty}}</td>
                                                </tr>
                                                @endforeach


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="border-radius: 0px;">
                                <div class="col-md-3 col-md-offset-9">
                                    <p class="text-right"><b>Sub-total:</b> {{Cart::subtotal()}}Tk</p>
                                    <p class="text-right">VAT: {{Cart::tax()}}%</p>
                                    <hr>
                                    <h3 class="text-right">BDT {{Cart::total()}} Tk</h3>
                                </div>
                            </div>
                            <hr>
                            <div class="hidden-print">
                                <div class="pull-right">
                                <a href="#" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#modelId">Submit Order</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>



        </div> <!-- container -->

    </div> <!-- content -->

    <footer class="footer text-right">
        2015 © Moltran.
    </footer>




    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <form action="{{url('/confirm-invoice/')}}" method="POST">
            @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                    <div class="modal-header">
                            <h3 class="modal-title">Invoice Of {{$customerInfo->customer_name}} <span class="pull-right" id="total_balance">{{Cart::total()}}</span></h3>

                        </div>
                <div class="modal-body">
                    <div class="container-fluid">

                            <div class="form-group">
                                <label for="payment_method">Select Payment Method</label>
                                <select name="payment_method" onclick="pMethod()" id="payment_method" class="form-control">
                                    <option value="Handcash">Handcash</option>
                                    <option value="Cheaque">Cheaque</option>
                                    <option value="Due">Due</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="payable_amount">Payable Amount</label>
                                <input type="number" oninput="amount()" name="payable_amount" id="payable" class="form-control" placeholder="Payable Amount">
                            </div>
                            <div class="form-group">
                                <label for="due_amount">Due Amount</label>
                                <input type="number" name="due_amount" id="due" class="form-control" placeholder="Due Amount">
                            </div>

                            <input type="hidden" value="{{$customerInfo->customer_id}}" name="customer_id">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" class="close" data-dismiss="modal" aria-label="Close">Closed</button>
                    <button type="submit" class="btn btn-primary">Payment</button>
                </div>
            </div>
        </div>

    </form>
    </div>

    <script>

        function amount(){
            var payable=document.querySelector("#payable").value;
            var total=document.querySelector("#total_balance").innerHTML;
            total=total.replace(/[^\d\.\-]/g,"");
            var due=total - payable;
            document.querySelector("#due").value=due;
            // document.getElementById("due").disabled = true;
            document.getElementById("due").readOnly = true;
        }

        function pMethod(){
            var method=document.querySelector("#payment_method").value;

            if(method !='Due'){
                document.querySelector("#payable").value=''
                document.getElementById("payable").readOnly = false;

                document.querySelector("#due").value='';
                document.getElementById("due").readOnly = false;

            }
            if(method=='Due'){
                document.querySelector("#payable").value=0
                document.getElementById("payable").readOnly = true;

                var total=document.querySelector("#total_balance").innerHTML;
                total=total.replace(/[^\d\.\-]/g,"");
                document.querySelector("#due").value=total;
                document.getElementById("due").readOnly = true;

            }


        }




    </script>

</div>
@endsection
