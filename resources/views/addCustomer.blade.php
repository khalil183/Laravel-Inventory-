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
                        <div class="panel-heading"><h1 class="panel-title text-center">Add Customer</h1></div>
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

                                <div class="form-group m-b-0">
                                    <div class="col-sm-offset-3 col-sm-9">
                                        <button type="submit" class="btn btn-info waves-effect waves-light">ADD Customer</button>
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
