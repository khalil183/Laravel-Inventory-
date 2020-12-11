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
                            <h3 class="panel-title">All Supplyers</h3>
                        </div>

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Supplyer Name</th>
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
                                            @foreach($supplyer as $row)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$row->supplyer_name}}</td>
                                                <td>{{$row->supplyer_phone}}</td>
                                                <td>{{$row->supplyer_shope_name}}</td>
                                                <td>{{$row->supplyer_total}} TK</td>
                                                <td>{{$row->supplyer_payment}} TK</td>
                                                <td>{{$row->supplyer_total - $row->supplyer_payment}} TK</td>

                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                          Action
                                                        </button>
                                                        <div class="dropdown-menu">
                                                          <a class="dropdown-item list-group-item bg-primary" href="{{url('/edit')}}">Edit</a>
                                                          <a class="dropdown-item list-group-item bg-success" href="#">View</a>
                                                          <a class="dropdown-item list-group-item bg-danger" href="#">Delete</a>

                                                        </div>

                                                      </div>
                                                      <a onclick="supplyerPayment({{$row->supplyer_id}})" href="#" data-toggle="modal" data-target="#supplyerpaymentmodal-{{$row->supplyer_id}}" class="btn btn-primary">Payment</a>
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

    @foreach ($supplyer as $item)
        <!-- Modal -->
        <div class="modal fade" id="supplyerpaymentmodal-{{$item->supplyer_id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <form action="{{url('/supplyer-payment/'.$item->supplyer_id)}}" method="POST">
                    @csrf
                <div class="modal-content">
                        <div class="modal-header">
                                <h3 class="modal-title">Supplyer {{$item->supplyer_name}} Payment</h3>

                            </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="form-group">
                                <label for="total_due-{{$item->supplyer_id}}">Total Due</label>
                                <input type="text" value='{{$item->supplyer_total - $item->supplyer_payment}}' name="total_due" id="total_due-{{$item->supplyer_id}}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="customer_pay-{{$item->supplyer_id}}">Payable Amount</label>
                                <input oninput="supplyer_payable_amount({{$item->supplyer_id}})" type="number" placeholder="Payable Amount" name="payable_amount" id="customer_pay-{{$item->supplyer_id}}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="update_due">Update Due</label>
                                <input type="text" name="update_due" class="form-control" id="update_due-{{$item->supplyer_id}}" class="form-group">
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

</div>


<script>
    function supplyerPayment(id){
        document.getElementById("total_due-"+id).readOnly = true;
    }

    function supplyer_payable_amount(id){
        var payableVale=document.querySelector("#customer_pay-"+id).value;
        var total_due=document.querySelector("#total_due-"+id).value;

        var updateDue=total_due - payableVale;
        document.querySelector("#update_due-"+id).value=updateDue;
        document.getElementById("update_due-"+id).readOnly = true;

    }
</script>
@endsection
