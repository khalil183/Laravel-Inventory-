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
                            <h3 class="panel-title">All Customers</h3>
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
                                                <th>Shope name</th>
                                                <th>Total Amount</th>
                                                <th>Payable</th>
                                                <th>Due</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>


                                        <tbody>
                                            <?php $i=1 ?>
                                            @foreach($customer as $row)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$row->customer_name}}</td>
                                                <td>{{$row->customer_phone}}</td>
                                                <td>{{$row->customer_shope_name}}</td>
                                                <td>{{$row->customer_total}} TK</td>
                                                <td>{{$row->customer_payment}} TK</td>
                                                <td>{{$row->customer_total - $row->customer_payment}} TK</td>

                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                          Action
                                                        </button>
                                                        <div class="dropdown-menu">
                                                          <a class="dropdown-item list-group-item bg-primary" href="#">Edit</a>
                                                          <a class="dropdown-item list-group-item bg-success" href="#">View</a>
                                                          <a class="dropdown-item list-group-item bg-danger" href="#">Delete</a>

                                                        </div>

                                                      </div>
                                                      <a onclick="customerPayment({{$row->customer_id}})" href="#" data-toggle="modal" data-target="#paymentmodal-{{$row->customer_id}}" class="btn btn-primary">Payment</a>
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


{{-- Payment modal --}}

@foreach ($customer as $item)

<!-- Modal -->
<div class="modal fade" id="paymentmodal-{{$item->customer_id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <form action="{{url('/customer-payment/'.$item->customer_id)}}" method="POST">
            @csrf
        <div class="modal-content">
                <div class="modal-header">
                        <h3 class="modal-title">{{$item->customer_name}} Payment System</h3>

                    </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="form-group">
                        <label for="total_due-{{$item->customer_id}}">Total Due</label>
                        <input type="text" value='{{$item->customer_total - $item->customer_payment}}' name="total_due" id="total_due-{{$item->customer_id}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="customer_pay-{{$item->customer_id}}">Payable Amount</label>
                        <input oninput="customer_payable_amount({{$item->customer_id}})" type="number" placeholder="Payable Amount" name="payable_amount" id="customer_pay-{{$item->customer_id}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="update_due">Update Due</label>
                        <input type="text" name="update_due" class="form-control" id="update_due-{{$item->customer_id}}" class="form-group">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
    </div>
</div>
@endforeach
<script>
    function customerPayment(id){
        document.getElementById("total_due-"+id).readOnly = true;
    }

    function customer_payable_amount(id){
        var payableVale=document.querySelector("#customer_pay-"+id).value;
        var total_due=document.querySelector("#total_due-"+id).value;

        var updateDue=total_due - payableVale;
        document.querySelector("#update_due-"+id).value=updateDue;
        document.getElementById("update_due-"+id).readOnly = true;

    }
</script>
@endsection
