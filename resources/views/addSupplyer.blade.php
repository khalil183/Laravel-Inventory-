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
                        <div class="panel-heading"><h1 class="panel-title text-center">Add Supplyer</h1></div>
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
                            <form method="post" action="{{url('/store-supplyer-info')}}" class="form-horizontal" role="form">
                            @csrf
                                <div class="form-group">
                                    <label for="Supplyer Name" class="col-sm-3 control-label">Supplyer Name</label>
                                    <div class="col-sm-9">
                                        <input type="text"  required class="form-control" name="supplyer_name" id="Supplyer Name" placeholder="Supplyer Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Supplyer Phone" class="col-sm-3 control-label">Supplyer Phone</label>
                                    <div class="col-sm-9">
                                        <input type="text" required class="form-control" id="Supplyer Phone" placeholder="Supplyer Phone" name="supplyer_phone">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Supplyer Phone" class="col-sm-3 control-label">Supplyer Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" id="Supplyer Email" placeholder="Supplyer Email" name="supplyer_email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Supplyer Address" class="col-sm-3 control-label">Supplyer Address</label>
                                    <div class="col-sm-9">
                                        <input required type="text" class="form-control" id="Supplyer Address" name="supplyer_address" placeholder="Supplyer Address">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="Supplyer Shop Name" class="col-sm-3 control-label">Supplyer Shop Name</label>
                                    <div class="col-sm-9">
                                        <input required type="text" class="form-control" id="Supplyer Shop Name" name="supplyer_shope_name" placeholder="Supplyer Shop Name">
                                    </div>
                                </div>

                                <div class="form-group m-b-0">
                                    <div class="col-sm-offset-3 col-sm-9">
                                        <button type="submit" class="btn btn-info waves-effect waves-light">ADD Supplyer</button>
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
