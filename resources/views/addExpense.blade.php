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
                        <div class="panel-heading"><h1 class="panel-title text-center">Add Expense</h1></div>
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
                            <form method="post" action="{{url('/store-expense-info')}}" class="form-horizontal" role="form">
                            @csrf
                                <div class="form-group">
                                    <label for="Add Expense" class="col-sm-3 control-label">Add Expense</label>
                                    <div class="col-sm-9">
                                        <input type="number"  required class="form-control" name="expense_amount" id="Add Expense" placeholder="Add Expense">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Details" class="col-sm-3 control-label">Details</label>
                                    <div class="col-sm-9">
                                        <textarea name="expense_details" id="Details" placeholder="Details" cols="30" rows="5" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Date" class="col-sm-3 control-label">Date</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" id="Date" placeholder="Date" name="expense_day">
                                    </div>
                                </div>


                                <div class="form-group m-b-0">
                                    <div class="col-sm-offset-3 col-sm-9">
                                        <button type="submit" class="btn btn-info waves-effect waves-light">ADD Expense</button>
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
