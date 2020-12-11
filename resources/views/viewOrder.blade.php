@extends('layouts.app')
@section('admin_content')
<div class="content-page">
    <!-- Start content -->
    <div class="content" id="printOrder">
        <div class="container">
            <div class="row" >
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
                                            Customer Name: <strong>{{$order->customer_name}}</strong><br>
                                            Shope Name: <strong>{{$order->customer_shope_name}}</strong><br>
                                            Address: <strong>{{$order->customer_address}}</strong><br>
                                            Phone: <strong>{{$order->customer_phone}}</strong><br>


                                          </address>
                                    </div>
                                    <div class="pull-right m-t-30">
                                        <p><strong>Order Date: </strong> {{date('d-m-Y')}}</p>
                                    <p class="m-t-10"><strong>Order Status: </strong> <span class="label label-pink">{{$order->order_status}}</span></p>
                                    <p><strong>Order Id:   </strong> #{{$order->order_id}}</p>

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
                                                @foreach ($order_details as $item)
                                                <tr>
                                                    <td>{{$i++}}</td>
                                                    <td>{{$item->product_name}}</td>
                                                    <td>{{$item->sell_price}} Tk</td>
                                                    <td>{{$item->product_qty}}</td>
                                                    <td>{{$item->sell_price * $item->product_qty}} TK</td>
                                                </tr>
                                                @endforeach


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="border-radius: 0px;">
                                <div class="col-md-3">
                                    <h4 >Payment Method: {{$order->payment_method}}</h4>
                                    <hr>
                                    <h4 >Due Amount: {{$order->due_amount}}tk</h4>
                                    <hr>
                                    <h3>Payable Amount: {{$order->payable_amount}} Tk</h3>
                                </div>

                                <div class="col-md-3 col-md-offset-6">
                                    <p class="text-right">VAT:0.00 %</p>
                                    <hr>
                                    <h3 class="text-right">Total: {{$order->total_price}} Tk</h3>
                                </div>

                            </div>




                            <hr>
                            <div class="hidden-print">
                                <div class="pull-right">
                                <a href="#" onclick="printInvoice()" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i></a>
                                @if ($order->order_status=='pending')
                                <a href="{{url('/confirm-order/'.$order->order_id)}}" class="btn btn-primary waves-effect waves-light">Confirm Order</a>
                                @endif


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

</div>
<script>
    function printInvoice(){
        var docPage=document.body.innerHTML;
        var printValue=document.getElementById('printOrder').innerHTML;
        document.body.innerHTML=printValue
        window.print();
        document.body.innerHTML=docPage




    }
</script>
@endsection
