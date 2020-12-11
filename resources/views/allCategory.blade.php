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
                            <h3 class="panel-title">All Categories</h3>
                        </div>

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Category Name</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>


                                        <tbody>
                                            <?php $i=1 ?>
                                            @foreach($category as $row)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$row->category_name}}</td>
                                                <td>
                                                    {{-- <a href="{{url('/view/book/'.$row->category_id)}}" class="btn btn-success">View</a>
                                                    <a href="{{url('/edit/book/'.$row->category_id)}}" class="btn btn-primary">Edit</a>
                                                    <a onclick="return confirm('Are you sure delete a Order Info??')" href="{{url('/delete/book/'.$row->category_id)}}" class="btn btn-danger">Delete</a> --}}
                                                    <button class="btn btn-primary">Action</button>
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
@endsection
